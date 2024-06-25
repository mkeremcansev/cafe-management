<?php

namespace App\Models;

use App\Enums\CollectionMethod;
use App\Enums\CollectionType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collection extends BaseOwnableModel
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'method',
        'type',
        'user_id',
        'table_state_id',
    ];

    protected $casts = [
        'method' => CollectionMethod::class,
        'type' => CollectionType::class,
    ];

    public function details(): HasMany
    {
        return $this->hasMany(CollectionDetail::class);
    }

    public function scopeLastMonth(Builder $query): Builder
    {
        return $query->whereBetween('created_at', [now()->subDays(30), now()]);
    }

    public function scopeLastDay(Builder $query): Builder
    {
        return $query->whereBetween('created_at', [now()->subDay(), now()]);
    }
}
