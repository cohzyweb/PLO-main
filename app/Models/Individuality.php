<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Individuality extends Model
{
    protected $connection = 'mysql';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'is_public',
    ];
}
