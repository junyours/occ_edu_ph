<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsSdg;
use App\Models\Sdg;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('sdg')->get();

        return view('pages.app.news.index', compact('news'));
    }

    public function create()
    {
        $options = Sdg::query()->select('id', 'name as label')->get();

        return view('pages.app.news.create', compact('options'));
    }

    public function add(Request $request)
    {
        $accessToken = $this->token();

        $request->validate([
            'sdg' => ['required', 'array', 'min:1'],
            'image' => ['required', 'mimes:jpeg,jpg,png', 'max:2048'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
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
                'title' => $request->title,
                'description' => $request->description,
                'date' => Carbon::parse($request->date)
                    ->timezone('Asia/Manila')
                    ->toDateString(),
            ]);

            foreach ($request->sdg as $sdgId) {
                NewsSdg::create([
                    'news_id' => $news->id,
                    'sdg_id' => $sdgId,
                ]);
            }

            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $news = News::with('sdg')->findOrFail($id);
        $options = Sdg::query()->select('id', 'name as label')->get();

        return view('pages.app.news.edit', compact('news', 'options'));
    }

    public function update(Request $request, $id)
    {
        $accessToken = $this->token();

        $news = News::findOrFail($id);

        $request->validate([
            'sdg' => ['required', 'array', 'min:1'],
            'image' => ['nullable', 'mimes:jpeg,jpg,png', 'max:2048'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
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
            'title' => $request->title,
            'description' => $request->description,
            'date' => \Carbon\Carbon::parse($request->date)
                ->timezone('Asia/Manila')
                ->toDateString(),
        ]);

        NewsSdg::where('news_id', $news->id)->delete();
        foreach ($request->sdg as $sdgId) {
            NewsSdg::create([
                'news_id' => $news->id,
                'sdg_id' => $sdgId,
            ]);
        }

        return redirect()->back();
    }

    public function delete($id)
    {
        $news = News::findOrFail($id);
        $accessToken = $this->token();

        Http::withToken($accessToken)->delete("https://www.googleapis.com/drive/v3/files/{$news->image}");

        NewsSdg::where('news_id', $news->id)->delete();

        $news->delete();

        return redirect()->back();
    }

}
