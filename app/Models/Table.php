<?php

namespace App\Models;

use App\Enums\TableStatus;
use App\Models\Scopes\ByUserScope;
use App\Traits\WithSlug;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Table extends BaseOwnableModel
{
    use HasFactory;
    use WithSlug;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function states(): HasMany
    {
        return $this->hasMany(TableState::class);
    }

    public function closeOrOpenStates(): HasMany
    {
        return $this->states()->whereIn('status', [TableStatus::OPEN, TableStatus::CLOSE]);
    }

    public function closeOrOpenState(): HasOne
    {
        return $this->hasOne(TableState::class)->whereIn('status', [TableStatus::OPEN, TableStatus::CLOSE]);
    }

    public function closeState(): HasOne
    {
        return $this->hasOne(TableState::class)->where('status', TableStatus::CLOSE);
    }

    public function openState(): HasOne
    {
        return $this->hasOne(TableState::class)->where('status', TableStatus::OPEN);
    }

    public function scopeHasCloseOrOpenState(Builder $query): Builder
    {
        return $query->whereHas('states', fn ($query) => $query->whereIn('status', [TableStatus::OPEN, TableStatus::CLOSE]));
    }

    public function status(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->closeOrOpenStates()
                ->latest()
                ->first()
                ->status
        );
    }

    public function carts()
    {
        return $this->hasManyThrough(Cart::class, TableState::class)
            ->where('table_states.status', 1)
            ->withoutGlobalScope(ByUserScope::class);
    }
}
