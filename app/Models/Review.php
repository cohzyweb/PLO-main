<?php

namespace App\Models;

use App\Models\Member;
use App\Models\Cast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $connection = 'mysql';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'member_id',
        'cast_id',
        'title',
        'content',
        'is_public',
        'manager_comment',
        'cast_point',
        'play_point',
        'price_point',
        'staff_point',
        'photo_point',
        'average_point',
        'history_id',
    ];

    /**
     * Member relationship.
     */
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    /**
     * Cast relationship.
     */
    public function cast(): BelongsTo
    {
        return $this->belongsTo(Cast::class);
    }
}
