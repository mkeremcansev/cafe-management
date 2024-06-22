<?php

namespace App\Models;

use App\Traits\WithSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends BaseOwnableModel
{
    use HasFactory;
    use WithSlug;

    protected $fillable = [
        'name',
        'slug',
        'user_id',
    ];
}
