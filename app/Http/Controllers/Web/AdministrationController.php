<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Hashids\Hashids;

class AdministrationController extends Controller
{
    public function linkage(Request $request)
    {
        $hashids = new Hashids(config('app.key'), 36);

        $search = $request->input('search');

        $news = News::whereHas('link')
            ->with('sdg')
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

        return Inertia::render('web/administrations/linkage', [
            'news' => $news
        ]);
    }
}
