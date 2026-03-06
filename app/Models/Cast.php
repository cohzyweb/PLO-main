<?php

namespace App\Models;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cast extends Model
{
    protected $connection = 'mysql';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'shop_id',
        'joined_at',
        'age',
        'height',
        'bra_size',
        'bust',
        'waist',
        'rank',
        'hip',
        'appeal_point',
        'manager_comment',
        'profile_url',
        'diary_email_from',
        'diary_email_to',
        'diary_email_password',
        'gallery_1',
        'gallery_2',
        'gallery_3',
        'gallery_4',
        'gallery_5',
        'gallery_6',
        'gallery_7',
        'gallery_8',
        'gallery_9',
        'gallery_10',
        'is_public',
        'memo',
        'video1_id',
        'video2_id',
        'catch_copy'
    ];

    /**
     * Shop relationship.
     */
    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    public function options()
    {
        return $this->belongsToMany(Option::class);
    }

    public function personalities()
    {
        return $this->belongsToMany(Personality::class);
    }

    public function playstyles()
    {
        return $this->belongsToMany(Playstyle::class);
    }

    public function individualities()
    {
        return $this->belongsToMany(Individuality::class);
    }

    public function styles()
    {
        return $this->belongsToMany(Style::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function video1(): BelongsTo
    {
        return $this->belongsTo(Video::class);
    }

    public function video2(): BelongsTo
    {
        return $this->belongsTo(Video::class);
    }
}
