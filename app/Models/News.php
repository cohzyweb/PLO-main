<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $connection = 'mysql';
    protected $fillable = [
        'shop_id',
        'published_at',
        'title',
        'contents',
        'thumbnail',
        'published_status',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
