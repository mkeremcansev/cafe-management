<?php

namespace App\Enums;

use App\Traits\IsEnum;

enum TableStatus: int
{
    use IsEnum;

    case CLOSE = 0;
    case OPEN = 1;
    case COLLECTED = 2;
    case MOVED = 3;
}
