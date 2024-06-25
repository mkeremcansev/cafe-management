@extends('layouts.default')
@push('scripts')
    <script src="{{ asset('assets/plugins/chart/Chart.bundle.js') }}"></script>
    <script>
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
                    borderColor: "#fa4c6e",
                    borderWidth: "0",
                    backgroundColor: "#fa4c6e"
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
                    <h3 class="card-title">Bar Chart</h3>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="chart" class="h-275"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
