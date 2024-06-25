<?php

namespace App\Http\Controllers;

use App\Enums\CollectionMethod;
use App\Models\Collection;
use App\Models\Table;
use App\Services\MoneyService;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function __construct(public Table $table, public Collection $collection)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $reports = [];

        foreach (CollectionMethod::cases() as $collectionMethod){
            foreach (get_months_by_current_year(upToTheCurrentMonth: true) as $month) {
                $reports[$month['month']][$collectionMethod->value] =
                    $this->collection
                        ->whereYear('created_at', now()->year)
                        ->whereMonth('created_at', (int)$month['value'])
                        ->where('method', $collectionMethod->value)
                        ->moneySum('amount');
            }
        }

        return view('pages.report.report')
            ->with('reports', $reports);
    }
}
