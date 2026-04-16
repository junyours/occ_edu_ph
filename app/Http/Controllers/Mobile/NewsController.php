<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news()
    {
        $news = News::with('sdg')
            ->orderByDesc('date')
            ->get();

        return response()->json($news);
    }

    public function article($id)
    {
        $article = News::where('id', $id)
            ->with('sdg')
            ->first();

        return response()->json($article);
    }
}
