<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecruitApplication extends Model
{
    protected $fillable = [
        'type',
        'shop',
        'name',
        'furigana',
        'email',
        'phone',
        'age',
        'experience',
        'subject',
        'inquiry',
        'privacy_agreed',
        'meta',
        'status',
    ];

    protected $casts = [
        'privacy_agreed' => 'boolean',
        'meta' => 'array',
    ];
}
