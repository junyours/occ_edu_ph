<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Sdg;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $years = News::query()
            ->join('news_sdg', 'news.id', '=', 'news_sdg.news_id')
            ->selectRaw('YEAR(news.date) as year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year');

        $year = $request->get('year', $years->first());

        $sdgs = Sdg::select('id', 'name')->get();

        $rawData = News::query()
            ->selectRaw('
                MONTH(news.date) as month,
                sdg.name as sdg_name,
                COUNT(*) as total
            ')
            ->join('news_sdg', 'news.id', '=', 'news_sdg.news_id')
            ->join('sdg', 'sdg.id', '=', 'news_sdg.sdg_id')
            ->whereYear('news.date', $year)
            ->groupBy('month', 'sdg.name')
            ->orderBy('month')
            ->get();

        $chartData = collect(range(1, 12))->map(function ($month) use ($rawData, $sdgs) {
            $row = [
                'month' => Carbon::create()->month($month)->format('F'),
            ];

            foreach ($sdgs as $sdg) {
                $row[$sdg->name] = $rawData
                    ->where('month', $month)
                    ->where('sdg_name', $sdg->name)
                    ->first()
                    ->total ?? 0;
            }

            return $row;
        });

        return Inertia::render('app/dashboard', [
            'chartData' => $chartData,
            'sdgs' => $sdgs,
            'years' => $years,
            'year' => $year,
        ]);
    }
}
