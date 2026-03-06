<?php

namespace App\Models;

use App\Models\Cast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pickup extends Model
{
    protected $connection = 'mysql';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'shop_id',
        'cast_id',
    ];

    /**
     * Cast relationship.
     */
    public function cast(): BelongsTo
    {
        return $this->belongsTo(Cast::class);
    }


    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }
}
