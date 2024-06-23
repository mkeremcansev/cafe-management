<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends BaseOwnableModel
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'table_state_id',
        'quantity',
        'price',
        'total_price',
    ];

    protected $casts = [
        'price' => MoneyCast::class,
        'total_price' => MoneyCast::class,
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function tableState(): BelongsTo
    {
        return $this->belongsTo(TableState::class);
    }
}
