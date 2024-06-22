<?php

namespace App\Casts;

use App\Services\MoneyService;
use Brick\Money\Money;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class MoneyCast implements CastsAttributes
{
    public function get($model, $key, $value, $attributes): ?Money
    {
        return $value === null
            ? null
            : MoneyService::ofMinor($value);
    }

    public function set($model, $key, $value, $attributes): mixed
    {
        if ($value instanceof Money) {
            return $value->getMinorAmount()->toInt();
        }

        return $value;
    }
}
