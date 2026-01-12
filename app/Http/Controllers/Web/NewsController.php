<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\News;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $hashids = new Hashids(config('app.key'), 36);

        $search = $request->input('search');

        $news = News::with('sdg')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%");
                });
            })
            ->orderByDesc('date')
            ->get()
            ->map(function ($item) use ($hashids) {
                $item->hash_id = $hashids->encode($item->id);
                return $item;
            });

        $images = $news->pluck('image');

        $count = $news->count();

        return Inertia::render('web/news/index', [
            'news' => $news,
            'count' => $count,
            'search' => $search,
            'images' => $images
        ]);
    }

    public function article($hash_id)
    {
        $hashids = new Hashids(config('app.key'), 36);
        $ids = $hashids->decode($hash_id);

        if (empty($ids)) {
            abort(404);
        }

        $id = $ids[0];

        $article = News::where('id', $id)
            ->with('sdg')
            ->firstOrFail();

        return Inertia::render('web/news/article', [
            'article' => $article
        ])->withViewData([
                    'article_meta' => [
                        'title' => $article->title,
                        'description' => $article->description,
                        'image' => "https://lh3.googleusercontent.com/d/{$article->image}",
                        'type' => 'article',
                        'url' => url()->current(),
                        'site_name' => config('app.name'),
                    ]
                ]);
    }
}
