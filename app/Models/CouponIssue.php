<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CouponIssue extends Model
{
    //
    use SoftDeletes;
    protected $connection = 'member_mysql';
    protected $table = 'coupon_issues';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'shop_id',
        'office_id',
        'coupon_id',
        'frequency_eq_group',
        'frequency_eq_shop'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
//        'created_at',
        'updated_at'

    ];

}
