<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class History extends Model
{
    // use SoftDeletes;
    protected $connection = 'member_mysql';
    protected $table = 'histories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'shop_id',
        'office_id',
        'name',
        'cast_id',
        'cast_name',
        'course_id',
        'course_name',
        'memo',
        'created_at',
        'datano',
        'shop_name',
        'place_name',
        'place_addr',
        'price',
        'price_course',
        'price_option',
        'price_trans',
        'price_call',
        'price_extension',
        'price_discount',

        'option_name',
        'trans_name',
        'call_id',
        'call_name',
        'extention_id',
        'extension_name',
        'discount_name',
        'rate_point'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
//         'created_at',
        'updated_at'

    ];
    /**
     * 日付へキャストする属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function member()
    {
        return $this->belongsTo('App\Models\Member')->withTrashed();
    }

    public function cast()
    {
        return $this->belongsTo('App\Models\Cast')->withTrashed();
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course')->withTrashed();
    }

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop')->withTrashed();
    }
    public function office()
    {
        return $this->belongsTo('App\Models\Office')->withTrashed();
    }
    public function point_come()
    {
        return $this->hasOne('App\Models\Point')->where('type', 0);
    }

    public function point_come_manual()
    {
        return $this->hasOne('App\Models\Point')->where('type', 1);
    }

    public function point_come_use()
    {
        return $this->hasOne('App\Models\Point')->where('type', 2);
    }

    public function point_pay()
    {
        return $this->hasOne('App\Models\Point')->where('type', 3);
    }

    public function point_pay_manual()
    {
        return $this->hasOne('App\Models\Point')->where('type', 4);
    }

    public function point_pay_use()
    {
        return $this->hasOne('App\Models\Point')->where('type', 5);
    }
    
    public function points()
    {
        return $this->hasMany('App\Models\Point');
    }

    public function point_valid()
    {
        return $this->hasMany('App\Models\Point')->where('confirm', 1)->where('history_id', '<=', 'histories.id');
    }

    public function point_confirm()
    {
        return $this->hasMany('App\Models\Point')->where('confirm', 0)->where('history_id', '<=', 'histories.id');
    }

    public function couponuse()
    {
        return $this->hasMany('App\Models\CouponUse')->where('confirm', 1)->withTrashed();
    }
}
