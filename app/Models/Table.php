<?php

namespace App\Models;

use App\Enums\CartStatus;
use App\Enums\TableStatus;
use App\Models\Scopes\ByCompanyScope;
use App\Services\MoneyService;
use App\Traits\WithSlug;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Table extends BaseOwnableModel
{
    use HasFactory;
    use WithSlug;

    protected $fillable = [
        'name',
        'slug',
        'user_id',
        'company_id',
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

    public function openStates(): HasMany
    {
        return $this->states()->where('status', TableStatus::OPEN);
    }

    public function scopeHasCloseOrOpenState(Builder $query): Builder
    {
        return $query->whereHas('states', fn ($query) => $query->whereIn('status', [TableStatus::OPEN, TableStatus::CLOSE]));
    }

    public function scopeHasOpenState(Builder $query): Builder
    {
        return $query->whereHas('states', fn ($query) => $query->where('status', TableStatus::OPEN));
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

    public function totalCollection(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->openState
                ?->collections
                ?->moneySum('amount') ?? MoneyService::zero()
        );
    }

    public function hasCollections(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->openState
                ?->collections
                ?->isNotEmpty()
        );
    }

    public function carts(): HasManyThrough
    {
        return $this->hasManyThrough(Cart::class, TableState::class)
            ->where('table_states.status', TableStatus::OPEN)
            ->where('carts.status', CartStatus::PENDING)
            ->withoutGlobalScope(ByCompanyScope::class);
    }
}
