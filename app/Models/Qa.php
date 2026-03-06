<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qa extends Model
{
    protected $connection = 'mysql';
    protected $fillable = [
        'cast_id',
        'question_id',
        'answer',
        'rank',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
