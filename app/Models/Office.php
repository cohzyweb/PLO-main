<?php

namespace App\Models;

// use App\Notifications\OfficePasswordResetNotification;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Office extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $connection = 'member_mysql';
    protected $table = 'offices';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'reg_point',
        'unit_use',
        'max_use',
        'rate_point',
        'business_gap',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
        'deleted_at',
        'created_at',
        'updated_at',

    ];
    /**
     * 日付へキャストする属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * パスワードリセット通知の送信をオーバーライド
     *
     * @param string $token
     * @return void
     */
    // public function sendPasswordResetNotification($token)
    // {
    //     $this->notify(new OfficePasswordResetNotification($token));
    // }
}
