<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news(Request $request)
    {
        $search = $request->input('search');

        $news = News::select('id', 'title', 'image', 'date')
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%");
            })
            ->orderByDesc('date')
            ->paginate(10);

        return response()->json($news);
    }

    public function article($id)
    {
        $article = News::select('id', 'title', 'description', 'image', 'date')
            ->where('id', $id)
            ->with('sdg', function ($query) {
                $query->select('image');
            })
            ->first();

        return response()->json($article);
    }
}
