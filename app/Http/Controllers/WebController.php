<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Sdg;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home()
    {
        $news = News::with('sdg')->latest()->limit(6)->get();

        return view('pages.web.home.index', compact('news'));
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
        })->with('sdg')->latest()->get();

        return view('pages.web.sdg.news', compact('sdg', 'sdgs', 'news'));
    }

    public function article($id)
    {
        $article = News::whereHas('sdg', function ($query) use ($id) {
            $query->where('news_id', $id);
        })->with('sdg')->first();

        return view('pages.web.sdg.article', compact('article'));
    }
}
