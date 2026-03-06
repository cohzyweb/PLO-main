<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Point extends Model
{
    //
    use SoftDeletes;
    protected $connection = 'member_mysql';
    protected $table = 'points';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'shop_id',
        'office_id',
        'history_id',
        'type',
        'point',
        'confirm',
        'valid_point',

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
    /**
     * 日付へキャストする属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\Member')->withTrashed();
    }

    public function cast()
    {
        return $this->belongsTo('App\Models\Cast')->withTrashed();
    }

    public function history()
    {
        return $this->belongsTo('App\Models\Course')->withTrashed();
    }
}
