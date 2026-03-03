<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsLink extends Model
{
    protected $table = 'news_links';

    protected $fillable = [
        'news_id',
        'link_name',
    ];

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id');
    }
}
