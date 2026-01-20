<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsSdg;
use App\Models\Sdg;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $options = Sdg::select('id as value', 'name as label')->get();

        $news = News::with('sdg')
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%");
            })
            ->orderByDesc('date')
            ->paginate(10);

        return Inertia::render('app/news', [
            'search' => $search,
            'options' => $options,
            'news' => $news
        ]);
    }

    public function add(Request $request)
    {
        $accessToken = $this->token();

        $data = $request->validate([
            'sdg' => ['required', 'array', 'min:1'],
            'image' => ['required', 'mimes:jpeg,jpg,png'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'date' => ['required', 'date'],
        ]);

        $folderId = $this->getOrCreateFolder($accessToken, 'News', config('services.google.folder_id'));

        $file = $request->file('image');
        $mimeType = $file->getMimeType();

        $metadata = [
            'name' => 'temp_' . time(),
            'parents' => [$folderId],
        ];

        $uploadResponse = Http::withToken($accessToken)
            ->attach('metadata', json_encode($metadata), 'metadata.json', ['Content-Type' => 'application/json'])
            ->attach('media', file_get_contents($file), $file->getClientOriginalName(), ['Content-Type' => $mimeType])
            ->post('https://www.googleapis.com/upload/drive/v3/files?uploadType=multipart');

        if ($uploadResponse->successful()) {
            $fileId = $uploadResponse->json()['id'];

            Http::withToken($accessToken)->patch("https://www.googleapis.com/drive/v3/files/{$fileId}", [
                'name' => $fileId,
            ]);

            Http::withToken($accessToken)->post("https://www.googleapis.com/drive/v3/files/{$fileId}/permissions", [
                'role' => 'reader',
                'type' => 'anyone',
            ]);

            $news = News::create([
                'image' => $fileId,
                'title' => $data['title'],
                'description' => $data['description'],
                'date' => Carbon::parse($data['date'])
                    ->timezone('Asia/Manila')
                    ->toDateString(),
            ]);

            foreach ($data['sdg'] as $sdg) {
                NewsSdg::create([
                    'news_id' => $news->id,
                    'sdg_id' => $sdg['value'],
                ]);
            }
        }
    }

    public function update(Request $request)
    {
        $accessToken = $this->token();

        $news = News::findOrFail($request->input('id'));

        $data = $request->validate([
            'sdg' => ['sometimes', 'array', 'min:1'],
            'image' => ['nullable', 'mimes:jpeg,jpg,png'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'date' => ['required', 'date'],
        ]);

        $fileId = $news->image;

        if ($request->hasFile('image')) {
            $folderId = $this->getOrCreateFolder($accessToken, 'News', config('services.google.folder_id'));

            $file = $request->file('image');
            $mimeType = $file->getMimeType();

            $metadata = [
                'name' => 'temp_' . time(),
                'parents' => [$folderId],
            ];

            $uploadResponse = Http::withToken($accessToken)
                ->attach('metadata', json_encode($metadata), 'metadata.json', ['Content-Type' => 'application/json'])
                ->attach('media', file_get_contents($file), $file->getClientOriginalName(), ['Content-Type' => $mimeType])
                ->post('https://www.googleapis.com/upload/drive/v3/files?uploadType=multipart');

            if ($uploadResponse->successful()) {
                $newFileId = $uploadResponse->json()['id'];

                Http::withToken($accessToken)->patch("https://www.googleapis.com/drive/v3/files/{$newFileId}", [
                    'name' => $newFileId,
                ]);

                Http::withToken($accessToken)->post("https://www.googleapis.com/drive/v3/files/{$newFileId}/permissions", [
                    'role' => 'reader',
                    'type' => 'anyone',
                ]);

                Http::withToken($accessToken)->delete("https://www.googleapis.com/drive/v3/files/{$fileId}");

                $fileId = $newFileId;
            }
        }

        $news->update([
            'image' => $fileId,
            'title' => $data['title'],
            'description' => $data['description'],
            'date' => \Carbon\Carbon::parse($data['date'])
                ->timezone('Asia/Manila')
                ->toDateString(),
        ]);

        if ($request->filled('sdg')) {
            NewsSdg::where('news_id', $news->id)->delete();

            foreach ($data['sdg'] as $sdg) {
                NewsSdg::create([
                    'news_id' => $news->id,
                    'sdg_id' => $sdg['value'],
                ]);
            }
        }
    }

    public function delete(Request $request)
    {
        $news = News::findOrFail($request->input('id'));
        $accessToken = $this->token();

        Http::withToken($accessToken)->delete("https://www.googleapis.com/drive/v3/files/{$news->image}");

        NewsSdg::where('news_id', $news->id)->delete();

        $news->delete();
    }
}
