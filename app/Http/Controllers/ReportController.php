<?php

namespace App\Http\Controllers;

use App\Enums\CollectionMethod;
use App\Http\Requests\ReportFilterRequest;
use App\Models\Cart;
use App\Models\Collection;
use App\Models\Table;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function __construct(public Table $table, public Collection $collection, public Cart $cart) {}

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

        $soldProducts = $this->cart
            ->when($request->filter_type === 'product_filter' && $request->start_date !== null && $request->end_date !== null, function ($query) use ($request) {
                $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
            })
            ->when($request->filter_type !== 'product_filter', function ($query) {
                $query->whereYear('created_at', now()->year)
                    ->whereMonth('created_at', now()->month);
            })
            ->get()
            ->groupBy('product_id')
            ->map(function ($collection) {
                return [
                    'product_name' => $collection->first()->product->name,
                    'quantity' => $collection->sum('quantity'),
                    'total_price' => $collection->moneySum('total_price'),
                ];
            });

        if ($request->start_date !== null && $request->end_date !== null && $request->filter_type === 'collection_filter') {
            foreach (CollectionMethod::cases() as $collectionMethod) {
                $filterReports[$collectionMethod->value] =
                    $this->collection
                        ->whereBetween('created_at', [$request->start_date, $request->end_date])
                        ->where('method', $collectionMethod->value)
                        ->moneySum('amount');
            }

            return view('pages.report.report')
                ->withReports($reports)
                ->withFilterReports($filterReports)
                ->withSoldProducts($soldProducts);
        }

        return view('pages.report.report')
            ->withReports($reports)
            ->withSoldProducts($soldProducts);
    }
}
