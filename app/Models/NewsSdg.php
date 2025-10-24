<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsSdg extends Model
{
    protected $table = 'news_sdg';

    protected $fillable = [
        'news_id',
        'sdg_id',
    ];

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id');
    }

    public function sdg()
    {
        return $this->belongsTo(Sdg::class, 'sdg_id');
    }
}
