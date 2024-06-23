<?php

namespace App\Models;

use App\Traits\WithSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends BaseOwnableModel
{
    use HasFactory;
    use WithSlug;

    protected $fillable = [
        'name',
        'slug',
        'user_id',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
