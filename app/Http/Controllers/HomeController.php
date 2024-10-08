<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Company;
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
                auth()->user()->company->start_of_day === null
                    ? MoneyService::zero()
                    : $this->collection->whereBetween('created_at', [auth()->user()->company->start_of_day, now()])->get()->moneySum('amount')
            )
            ->withOpenTablesAmount(
                $this->table->with('openState.collections')->hasOpenState()->get()->reduce(function ($carry, $openTable) {
                    return $carry
                        ->plus($openTable->carts->moneySum('total_price'))
                        ->minus($openTable->openState->collections?->moneySum('amount') ?? MoneyService::zero());
                }, MoneyService::zero())
            );
    }

    public function cache(Company $company): bool
    {
        if (cache()->has("company_cache_{$company->id}") === false) {
            return false;
        }

        cache()->forget("company_cache_{$company->id}");

        return true;
    }
}
