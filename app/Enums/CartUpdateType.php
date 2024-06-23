<?php

namespace App\Enums;

use App\Traits\IsEnum;

enum CartUpdateType: int
{
    use IsEnum;

    case INCREMENT = 1;
    case DECREMENT = 2;
}
