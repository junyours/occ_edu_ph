<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Sdg;
use Hashids\Hashids;
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

    public function ted()
    {
        return view('pages.web.programs.ted.index');
    }

    public function cba()
    {
        return view('pages.web.programs.cba.index');
    }

    public function cit()
    {
        return view('pages.web.programs.cit.index');
    }

    public function news(Request $request)
    {
        $search = $request->input('search');

        $news = News::with('sdg')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%");
                });
            })
            ->orderByDesc('date')
            ->get();

        $images = $news->pluck('image');

        $count = $news->count();

        return view('pages.web.news.index', compact('news', 'count', 'search', 'images'));
    }

    public function article($hashedId)
    {
        $hashids = new Hashids(config('app.key'), 36);
        $ids = $hashids->decode($hashedId);

        if (empty($ids)) {
            abort(404);
        }

        $id = $ids[0];

        $article = News::where('id', $id)
            ->with('sdg')
            ->firstOrFail();

        return view('pages.web.news.article', compact('article'));
    }

    public function sdg()
    {
        $sdgs = Sdg::all();

        return view('pages.web.sdg.index', compact('sdgs'));
    }

    public function sdgNews(Request $request, $name)
    {
        $search = $request->input('search');

        $sdg = Sdg::where('name', $name)->firstOrFail();
        $sdgs = Sdg::all();

        $news = News::whereHas('sdg', function ($query) use ($sdg) {
            $query->where('sdg_id', $sdg->id);
        })
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%");
                });
            })
            ->with('sdg')
            ->orderByDesc('date')
            ->get();

        $count = $news->count();

        return view('pages.web.sdg.news', compact('sdg', 'sdgs', 'news', 'count', 'search'));
    }
}
