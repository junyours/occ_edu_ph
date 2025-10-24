<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sdg extends Model
{
    protected $table = 'sdg';

    protected $fillable = [
        'name',
        'image',
    ];

    public function news()
    {
        return $this->belongsToMany(News::class, 'news_sdg', 'sdg_id', 'news_id');
    }

}
