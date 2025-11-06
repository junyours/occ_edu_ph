<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Sdg;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home()
    {
        $news = News::with('sdg')
            ->orderByDesc('date')
            ->limit(3)
            ->get();

        return view('pages.web.home.index', compact('news'));
    }

    public function news()
    {
        $news = News::with('sdg')
            ->orderByDesc('date')
            ->get();

        return view('pages.web.news.index', compact('news'));
    }

    public function article($id)
    {
        $article = News::where('image', $id)
            ->with('sdg')
            ->firstOrFail();

        return view('pages.web.news.article', compact('article'));
    }

    public function sdg()
    {
        $sdgs = Sdg::all();

        return view('pages.web.sdg.index', compact('sdgs'));
    }

    public function sdgNews($name)
    {
        $sdg = Sdg::where('name', $name)->firstOrFail();
        $sdgs = Sdg::all();

        $news = News::whereHas('sdg', function ($query) use ($sdg) {
            $query->where('sdg_id', $sdg->id);
        })
            ->with('sdg')
            ->orderByDesc('date')
            ->get();

        return view('pages.web.sdg.news', compact('sdg', 'sdgs', 'news'));
    }
}
