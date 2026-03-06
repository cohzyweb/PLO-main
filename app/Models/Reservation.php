<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Attendance;

class Reservation extends Model
{
    protected $connection = 'mysql';
    protected $fillable = [
        'attendance_id',
        'start_time',
        'end_time',
    ];

    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }
}
