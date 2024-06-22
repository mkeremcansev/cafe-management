<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait WithSlug
{
    public static function bootWithSlug(): void
    {
        static::creating(static function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }
}
