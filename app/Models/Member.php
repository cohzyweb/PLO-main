<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class Member extends Authenticatable
{
  use Notifiable, HasApiTokens, HasFactory;
  use HasRoles;
//   protected $connection = 'member_mysql';
  protected $guard_name = 'member';
  protected $connection = 'mysql';
  protected $table = 'members';
  protected $fillable = [
    'id',
    'name',
    'subname',
    'email',
    'password',
    'tel',
    'oldid',
    'commentbr',
    'address',
    'birth',
    'crated_at',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var list<string>
   */
  protected $hidden = [
      'password',
      'remember_token',
  ];

  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
      return [
          'password' => 'hashed',
      ];
  }

  /**
   * Get the name of the unique identifier for the user.
   *
   * @return string
   */
  public function getAuthIdentifierName()
  {
      return 'id';
  }

  /**
   * Get the unique identifier for the user.
   *
   * @return mixed
   */
  public function getAuthIdentifier()
  {
      return $this->getAttribute($this->getAuthIdentifierName());
  }

  /**
   * Get the password for the user.
   *
   * @return string
   */
  public function getAuthPassword()
  {
      return $this->password;
  }

  /**
   * Get the token value for the "remember me" session.
   *
   * @return string|null
   */
  public function getRememberToken()
  {
      return $this->remember_token;
  }

  /**
   * Set the token value for the "remember me" session.
   *
   * @param  string  $value
   * @return void
   */
  public function setRememberToken($value)
  {
      $this->remember_token = $value;
  }

  /**
   * Get the column name for the "remember me" token.
   *
   * @return string
   */
  public function getRememberTokenName()
  {
      return 'remember_token';
  }
  
  public function couponuse()
  {
      return $this->hasMany('App\Models\CouponUse')
          ->where('confirm', 0)
          ->where('created_at', '>', DB::raw('( NOW( ) - INTERVAL 60 minute )'))
          ->withTrashed();
  }

  public function history()
  {
      return $this->hasOne('App\Models\History')->where('name', '来店')->orderBy('created_at', 'desc')->withTrashed();
  }

  public function histories()
  {
      return $this->hasMany('App\Models\History')->where('name', '来店')->orderBy('created_at', 'desc')->withTrashed();
  }

  public function recently()
  {
      return $this->hasMany('App\Models\History')->whereIn('name', ['来店', 'PT有効期限切れ'])->orderBy('created_at', 'desc')->with(['cast', 'course'])->limit(30);

  }
}

?>