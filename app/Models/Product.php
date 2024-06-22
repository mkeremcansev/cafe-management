<?php

namespace App\Models;

use App\Casts\MoneyCast;
use App\Traits\WithSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends BaseOwnableModel
{
    use HasFactory;
    use WithSlug;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'user_id',
        'category_id',
    ];

    protected $casts = [
        'price' => MoneyCast::class,
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
