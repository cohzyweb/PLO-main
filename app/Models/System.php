<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    protected $connection = 'mysql';
    protected $fillable = [
        'shop_id',
        'header',
        'play',
        'created_at',
        'update_at',
    ];
    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

}
