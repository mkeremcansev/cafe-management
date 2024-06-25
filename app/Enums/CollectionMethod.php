<?php

namespace App\Enums;

use App\Traits\IsEnum;

enum CollectionMethod: int
{
    use IsEnum;

    case CASH = 0;
    case CREDIT_CARD = 1;
}
