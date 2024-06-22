<?php

namespace App\Traits;

trait ByUser
{
    public static function bootByUser(): void
    {
        static::creating(static function ($model) {
            $model->user_id = auth()->id();
        });
    }
}
