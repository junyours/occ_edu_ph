<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Sdg;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SdgController extends Controller
{
    public function index()
    {
        $sdgs = Sdg::all();

        return Inertia::render('web/sdg/index', [
            'sdgs' => $sdgs
        ]);
    }

    public function sdgNews(Request $request, $name)
    {
        $hashids = new Hashids(config('app.key'), 36);

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
            ->get()
            ->map(function ($item) use ($hashids) {
                $item->hash_id = $hashids->encode($item->id);
                return $item;
            });

        $count = $news->count();

        return Inertia::render('web/sdg/news', [
            'sdg' => $sdg,
            'sdgs' => $sdgs,
            'news' => $news,
            'count' => $count,
            'search' => $search
        ]);
    }
}
