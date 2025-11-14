<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sdg;
use Http;
use Illuminate\Http\Request;

class SdgController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $sdgs = Sdg::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })
            ->get();

        return view('pages.app.sdg.index', compact('sdgs', 'search'));
    }

    public function create()
    {
        return view('pages.app.sdg.create');
    }

    public function add(Request $request)
    {
        $accessToken = $this->token();

        $request->validate([
            'image' => ['required', 'mimes:jpeg,jpg,png', 'max:2048'],
            'name' => ['required'],
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
                'name' => $request->name,
            ]);

            return redirect()->back()->with('success', 'News added successfully!');
        }
    }

    public function edit($id)
    {
        $sdg = Sdg::findOrFail($id);

        return view('pages.app.sdg.edit', compact('sdg'));
    }

    public function update(Request $request, $id)
    {
        $sdg = Sdg::findOrFail($id);
        $accessToken = $this->token();

        $request->validate([
            'name' => ['required'],
        ]);

        $sdg->update([
            'name' => $request->name,
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => ['mimes:jpeg,jpg,png', 'max:2048']
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

        return redirect()->back()->with('success', 'News updated successfully!');
    }

    public function delete($id)
    {
        $sdg = Sdg::findOrFail($id);
        $accessToken = $this->token();

        Http::withToken($accessToken)->delete("https://www.googleapis.com/drive/v3/files/{$sdg->image}");

        $sdg->delete();

        return redirect()->back()->with('success', 'News deleted successfully!');
    }
}
