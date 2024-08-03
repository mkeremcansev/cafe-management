<?php

namespace App\Observers;

use App\Models\Cart;
use App\Models\Collection;
use App\Models\Table;
use App\Models\TableState;
use Psr\SimpleCache\InvalidArgumentException;

class BaseCompanyObserver
{
    /**
     * @throws InvalidArgumentException
     */
    public function creating(Cart|Table|TableState|Collection $model): void
    {
        cache()->set("company_cache_{$model->company_id}", true, 60 * 60 * 24);
    }

    /**
     * @throws InvalidArgumentException
     */
    public function updating(Cart|Table|TableState|Collection $model): void
    {
        cache()->set("company_cache_{$model->company_id}", true, 60 * 60 * 24);
    }

    /**
     * @throws InvalidArgumentException
     */
    public function deleting(Cart|Table|TableState|Collection $model): void
    {
        cache()->set("company_cache_{$model->company_id}", true, 60 * 60 * 24);
    }
}
