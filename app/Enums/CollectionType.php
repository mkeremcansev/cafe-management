<?php

namespace App\Enums;

use App\Traits\IsEnum;

enum CollectionType: int
{
    use IsEnum;

    case MANUEL = 0;
    case PRODUCT_COLLECTION = 1;
}
