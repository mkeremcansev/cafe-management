<?php

namespace App\Models;

use App\Casts\MoneyCast;
use App\Enums\CartStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends BaseOwnableModel
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'status',
        'is_before_collection',
        'price',
        'total_price',
        'user_id',
        'company_id',
        'product_id',
        'table_state_id',
    ];

    protected $casts = [
        'price' => MoneyCast::class,
        'total_price' => MoneyCast::class,
        'status' => CartStatus::class,
        'is_before_collection' => 'boolean',
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
