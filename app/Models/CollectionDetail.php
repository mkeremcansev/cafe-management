<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class CollectionDetail extends BaseOwnableModel
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'price',
        'total_price',
        'user_id',
        'collection_id',
        'product_id',
    ];
}
