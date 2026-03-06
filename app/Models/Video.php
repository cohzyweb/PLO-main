<?php

namespace App\Models;

use App\Models\Cast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Video extends Model
{
    protected $connection = 'mysql';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cast_id',
        'video_url',
        'thumb_url',
        'is_public',
    ];

    /**
     * Cast relationship.
     */
    public function cast(): BelongsTo
    {
        return $this->belongsTo(Cast::class);
    }
}
