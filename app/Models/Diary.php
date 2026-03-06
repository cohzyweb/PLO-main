<?php

namespace App\Models;

use App\Models\Cast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Diary extends Model
{
    use SoftDeletes;

    protected $connection = 'mysql';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cast_id',
        'subject',
        'body',
        'photo',
        'uid',
        'slug',
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
