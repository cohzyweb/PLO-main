<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ranking extends Model
{
    protected $connection = 'mysql';
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'shop_id',
        'cast_id',
        'rank',
        'rank_id',
    ];

    /**
     * Get the shop that owns the ranking.
     */
    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * Get the cast that owns the ranking.
     */
    public function cast(): BelongsTo
    {
        return $this->belongsTo(Cast::class);
    }

    /**
     * Get the cast that owns the ranking.
     */
    public function rank(): BelongsTo
    {
        return $this->belongsTo(Rank::class);
    }
}
