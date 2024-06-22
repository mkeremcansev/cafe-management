<?php

namespace App\Enums;

use App\Traits\IsEnum;

enum CurrencyCode: string
{
    use IsEnum;

    case TRY = 'TRY';
}
