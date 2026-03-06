<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $connection = 'mysql';
    protected $fillable = [
        'title',
        'link_url',
        'shop_id',
        'is_public',
        'thumbnail',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
