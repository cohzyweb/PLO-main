<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extend extends Model
{
    protected $connection = 'mysql';
    protected $table = 'extends';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shop_id',
        'extend',
        'price',
        'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'

    ];
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
