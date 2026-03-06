<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rutorika\Sortable\SortableTrait;

class Coupon extends Model
{
    //
    use SoftDeletes;
    use SortableTrait;
    protected $connection = 'member_mysql';
    protected $table = 'coupons';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'content',
        'frequency_group',
        'frequency_shop',
        'frequency_eq_group',
        'frequency_eq_shop',
        'arrival',
        'startdate',
        'enddate',
        'starttime',
        'endtime',
        'week',
        'weeks',
        'prefs',
        'birth',
        'published',
        'plural',
        'shop_id',
        'office_id'
    ];
    /**
     * ネイティブなタイプへキャストする属性
     *
     * @var array
     */
    protected $casts = [
        'weeks' => 'array',
        'prefs' => 'array',

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

    public function getWeeksAttribute($value)
    {
        $weeks = json_decode($value);
        sort($weeks);
        return $weeks;
    }

    public function getPrefsAttribute($value)
    {
        if (is_null($value)) {
            $value = [];
            return ($value);
        }
        return json_decode($value);
    }

    public function issue()
    {
        return $this->hasMany('App\Models\CouponIssue');
    }

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }
}
