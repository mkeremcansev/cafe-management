<?php

namespace App\Models;

use App\Enums\TableStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TableState extends BaseOwnableModel
{
    use HasFactory;

    protected $fillable = [
        'status',
        'table_id',
    ];

    protected $casts = [
        'status' => TableStatus::class,
    ];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function collections(): HasMany
    {
        return $this->hasMany(Collection::class);
    }
}
