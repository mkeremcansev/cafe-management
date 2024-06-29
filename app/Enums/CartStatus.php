<?php

namespace App\Enums;

use App\Traits\IsEnum;

enum CartStatus: int
{
    use IsEnum;

    case PENDING = 0;
    case COLLECTED = 1;
}
