<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CouponUse extends Model
{
    //
    use SoftDeletes;
    protected $connection = 'member_mysql';
    protected $table = 'coupon_uses';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'shop_id',
        'office_id',
//         'history_id',
        'coupon_id',
//         'confirm'
    ];
    /**
     * ネイティブなタイプへキャストする属性
     *
     * @var array
     */
    protected $casts = [

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

    public function coupon()
    {
        return $this->belongsTo('App\Models\Coupon')->withTrashed();
    }
}
