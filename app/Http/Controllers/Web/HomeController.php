<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\News;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $hashids = new Hashids(config('app.key'), 36);

        $news = News::with('sdg')
            ->orderByDesc('date')
            ->limit(6)
            ->get()
            ->map(function ($item) use ($hashids) {
                $item->hash_id = $hashids->encode($item->id);
                return $item;
            });

        return Inertia::render('web/home/index', [
            'news' => $news,
        ]);
    }

}
