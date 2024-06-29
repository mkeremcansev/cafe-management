<?php

namespace App\Traits;

trait ByUserAndCompany
{
    public static function bootByUserAndCompany(): void
    {
        static::creating(static function ($model) {
            $model->user_id = auth()->id();
            $model->company_id = auth()->user()->company_id;
        });
    }
}
