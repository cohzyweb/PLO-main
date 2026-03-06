<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;

class Attendance extends Model
{
    protected $connection = 'mysql';
    protected $fillable = [
        'cast_id',
        'start_datetime',
        'end_datetime',
        'is_public',
    ];

    public function cast()
    {
        return $this->belongsTo(Cast::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
