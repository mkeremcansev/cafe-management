<?php

namespace App\Enums;

use App\Traits\IsEnum;

enum PaymentStatus: int
{
    use IsEnum;

    case PENDING = 0;
    case PARTLY_PAID = 1;
    case PAID = 2;
}
