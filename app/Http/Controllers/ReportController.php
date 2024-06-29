<?php

namespace App\Http\Controllers;

use App\Enums\CollectionMethod;
use App\Http\Requests\ReportFilterRequest;
use App\Models\Collection;
use App\Models\Table;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function __construct(public Table $table, public Collection $collection) {}

    /**
     * Display a listing of the resource.
     */
    public function index(ReportFilterRequest $request): View
    {
        $reports = [];
        $filterReports = [];

        foreach (CollectionMethod::cases() as $collectionMethod) {
            foreach (get_months_by_current_year(upToTheCurrentMonth: true) as $month) {
                $reports[$month['month']][$collectionMethod->value] =
                    $this->collection
                        ->whereYear('created_at', now()->year)
                        ->whereMonth('created_at', (int) $month['value'])
                        ->where('method', $collectionMethod->value)
                        ->moneySum('amount');
            }
        }

        if ($request->start_date !== null && $request->end_date !== null) {

            foreach (CollectionMethod::cases() as $collectionMethod) {
                $filterReports[$collectionMethod->value] =
                    $this->collection
                        ->whereBetween('created_at', [$request->start_date, $request->end_date])
                        ->where('method', $collectionMethod->value)
                        ->moneySum('amount');
            }

            return view('pages.report.report')
                ->withReports($reports)
                ->withFilterReports($filterReports);
        }

        return view('pages.report.report')
            ->withReports($reports);
    }

    public function filter(ReportFilterRequest $request)
    {

        return view('pages.report.report')
            ->withFilterReports($filterReports);
    }
}
