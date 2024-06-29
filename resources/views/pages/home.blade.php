@extends('layouts.default')
@section('title', __('words.menu.home'))
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">@lang('words.menu.home')</h1>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-2 fw-semibold">{{ $totalSalesAmount }}</h3>
                            <p class="text-muted fs-13 mb-0">@lang('words.content.analysis.total_sales_amount')</p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-danger ms-auto">
                                <i class="fa fa-money"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-2 fw-semibold">{{ $lastMonthSalesAmount }}</h3>
                            <p class="text-muted fs-13 mb-0">@lang('words.content.analysis.last_month_sales_amount')</p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-warning ms-auto">
                                <i class="fa fa-money"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-2 fw-semibold">{{ $lastDaySalesAmount }}</h3>
                            <p class="text-muted fs-13 mb-0">@lang('words.content.analysis.last_day_sales_amount')</p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-success ms-auto">
                                <i class="fa fa-money"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-2 fw-semibold">{{ $openTablesAmount }}</h3>
                            <p class="text-muted fs-13 mb-0">@lang('words.content.analysis.open_tables_amount')</p>
                        </div>
                        <div class="col col-auto top-icn dash">
                            <div class="counter-icon bg-danger ms-auto">
                                <i class="fa fa-money"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xl-12 mt-5 mb-5">
            <h1 class="text-center">@lang('words.menu.table.index')</h1>
        </div>
        @if($tables->count() > 0)
            @foreach($tables as $table)
                <div class="col-lg-6 col-sm-12 col-md-6 col-xl-3">
                    <div class="card text-white bg-{{ get_table_status_colors($table->status) }} card-collapsed">
                        <div class="card-header border-{{ get_table_status_colors($table->status) }}">
                            <a href="{{ route('dashboard.tables.show', $table->id) }}" class="text-white w-100">
                                <h3 class="card-title">
                                    <span>{{ $table->name }}</span>
                                    <span
                                        class="float-end">{{ $table->status->is(\App\Enums\TableStatus::OPEN) ? $table->carts->moneySum('total_price') : null }}</span>
                                </h3>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-lg-12 col-sm-12 col-md-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">@lang('words.content.home.there_is_no_have_table')</h3>
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection
