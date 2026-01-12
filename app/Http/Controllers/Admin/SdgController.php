<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sdg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class SdgController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $sdgs = Sdg::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })
            ->paginate(10);

        return Inertia::render('app/sdg', [
            'search' => $search,
            'sdgs' => $sdgs
        ]);
    }

    public function add(Request $request)
    {
        $accessToken = $this->token();

        $data = $request->validate([
            'image' => ['required', 'mimes:jpeg,jpg,png'],
            'name' => ['required', 'string'],
        ]);

        $folderId = $this->getOrCreateFolder($accessToken, 'SDG', config('services.google.folder_id'));

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

            Sdg::create([
                'image' => $fileId,
                'name' => $data['name'],
            ]);
        }
    }

    public function update(Request $request)
    {
        $sdg = Sdg::findOrFail($request->input('id'));
        $accessToken = $this->token();

        $data = $request->validate([
            'name' => ['required', 'string'],
        ]);

        $sdg->update([
            'name' => $data['name'],
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => ['mimes:jpeg,jpg,png']
            ]);

            Http::withToken($accessToken)->delete("https://www.googleapis.com/drive/v3/files/{$sdg->image}");

            $folderId = $this->getOrCreateFolder($accessToken, 'SDG', config('services.google.folder_id'));

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

                $sdg->update([
                    'image' => $fileId,
                ]);
            }
        }
    }

    public function delete(Request $request)
    {
        $sdg = Sdg::findOrFail($request->input('id'));

        $accessToken = $this->token();

        Http::withToken($accessToken)->delete("https://www.googleapis.com/drive/v3/files/{$sdg->image}");

        $sdg->delete();
    }
}
