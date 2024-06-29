@extends('layouts.default')
@push('scripts')
    <script src="{{ asset('assets/plugins/chart/Chart.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>

    <script>
        $('.datetimepicker_filter').datetimepicker({
            format: 'yyyy-mm-dd hh:ii',
            autoclose: true,
            initialDate: new Date(),
        });

        let ctx = document.getElementById("chart");
        let myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach($reports as $key => $report)
                        '{{ $key }}',
                    @endforeach
                ],
                datasets: [{
                    label: "@lang('words.fields.collection.methods.cash')",
                    data: [
                        @foreach($reports as $report)
                            {{ $report[\App\Enums\CollectionMethod::CASH->value]->getAmount() }},
                        @endforeach
                    ],
                    borderColor: "#FFA040",
                    borderWidth: "0",
                    backgroundColor: "#FFA040"
                }, {
                    label: "@lang('words.fields.collection.methods.credit_card')",
                    data: [
                        @foreach($reports as $report)
                            {{ $report[\App\Enums\CollectionMethod::CREDIT_CARD->value]->getAmount() }},
                        @endforeach
                    ],
                    borderColor: "#d12c47",
                    borderWidth: "0",
                    backgroundColor: "#d12c47"
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    labels: {
                        fontColor: "#77778e"
                    },
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            title: function (ctx) {
                                return ctx[0].formattedValue = '{{ config('app.currency') }} ' + ctx[0].formattedValue;
                            },
                        }
                    }
                },
            }
        });
        @if(isset($filterReports))
        let ctxFilter = document.getElementById("chart-filter");
        let myChartFilter = new Chart(ctxFilter, {
            type: 'bar',
            data: {
                labels: [
                    '{{ request()->query('start_date') }} - {{ request()->query('end_date') }}',
                ],
                datasets: [{
                    label: "@lang('words.fields.collection.methods.cash')",
                    data: [
                        {{ $filterReports[0]->getAmount() }}
                    ],
                    borderColor: "#FFA040",
                    borderWidth: "0",
                    backgroundColor: "#FFA040"
                }, {
                    label: "@lang('words.fields.collection.methods.credit_card')",
                    data: [
                        {{ $filterReports[1]->getAmount() }}
                    ],
                    borderColor: "#d12c47",
                    borderWidth: "0",
                    backgroundColor: "#d12c47"
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    labels: {
                        fontColor: "#77778e"
                    },
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            title: function (ctx) {
                                return ctx[0].formattedValue = '{{ config('app.currency') }} ' + ctx[0].formattedValue;
                            },
                        }
                    }
                },
            }
        });
        @endif
    </script>
@endpush
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">@lang('words.menu.report.report')</h1>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">@lang('words.content.analysis.month_based_sales_amount')</h3>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="chart" class="h-275"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">

            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">@lang('words.content.analysis.filter_based_sales_amount')</h3>
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('dashboard.reports') }}" method="GET">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="start_date">@lang('words.fields.report.start_date')</label>
                                            <div class="input-group col-md-12 ps-0">
                                                <div class="input-group-text bg-primary-transparent text-danger">
                                                    <i class="fe fe-calendar text-20"></i>
                                                </div>
                                                <input class="form-control datetimepicker_filter" id="start_date"
                                                       name="start_date" type="text"
                                                       value="{{ request()->query('start_date') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="end_date">@lang('words.fields.report.end_date')</label>
                                            <div class="input-group col-md-12 ps-0">
                                                <div class="input-group-text bg-primary-transparent text-danger">
                                                    <i class="fe fe-calendar text-20"></i>
                                                </div>
                                                <input class="form-control datetimepicker_filter" id="end_date"
                                                       name="end_date" type="text"
                                                       value="{{ request()->query('end_date') }}">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <button class="btn ripple btn-danger w-100" type="submit">@lang('words.buttons.filter')</button>
                            </form>
                        </div>
                    </div>

                    <div class="chart-container">
                        @if(isset($filterReports))
                            <canvas id="chart-filter" class="h-275"></canvas>
                        @else
                            <div class="text-center">
                                <h4>@lang('words.content.analysis.has_no_filter')</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
