<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OptionRS extends Model
{
    protected $connection = 'mysql';
    protected $table = 'options_rs';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'option_id',
        'shop_id',
        'price'
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
        return $this->belongsTo('App\Models\Shop');
    }

    public function option()
    {
        return $this->belongsTo('App\Models\Option');
    }
}
