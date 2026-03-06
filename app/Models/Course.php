<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rutorika\Sortable\SortableTrait;

class Course extends Model
{
    //
    //
    use SoftDeletes;
    // use SortableTrait;

    protected $connection = 'member_mysql';
    protected $table = 'courses';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'shop_id',
        'office_id',
        'point_come',
        'point_pay',
        'price',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at'

    ];

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }
}
