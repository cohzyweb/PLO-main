<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainVisual extends Model
{
    protected $connection = 'mysql';
    
    protected $fillable = [
        'shop_id',
        'image_order',
        'image_path',
        'link_url',
        'is_public',
    ];

    protected $casts = [
        'is_public' => 'boolean',
        'image_order' => 'integer',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
