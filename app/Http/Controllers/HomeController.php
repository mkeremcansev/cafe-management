<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Table;
use App\Services\MoneyService;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(public Table $table, public Collection $collection) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('pages.home')
            ->withTables(
                $this->table->with('carts')->hasCloseOrOpenState()->get()
            )
            ->withTotalSalesAmount(
                $this->collection->get()->moneySum('amount')
            )
            ->withLastMonthSalesAmount(
                $this->collection->lastMonth()->get()->moneySum('amount')
            )
            ->withLastDaySalesAmount(
                $this->collection->lastDay()->get()->moneySum('amount')
            )
            ->withOpenTablesAmount(
                $this->table->with('openState.collections')->hasOpenState()->get()->reduce(function ($carry, $openTable) {
                    return $carry
                        ->plus($openTable->carts->moneySum('total_price'))
                        ->minus($openTable->openState->collections?->moneySum('amount') ?? MoneyService::zero());
                }, MoneyService::zero())
            );
    }
}
