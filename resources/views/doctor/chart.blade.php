@extends('layouts.dash')
@section('content')
    @if (Auth::user()->is_admin())
        <x-stats />
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Daily Registered Patients</h4>
                    <canvas id="lineChart" height="450"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

    <!-- chartjs js -->
    <script src="{{ asset('dash') }}/plugins/chartjs/chart.min.js"></script>
    <script>
        ! function($) {
            "use strict";

            var ChartJs = function() {};
            ChartJs.prototype.respChart = function(selector, type, data, options) {

                    var ctx = selector.get(0).getContext("2d");
                    var container = $(selector).parent();
                    $(window).resize(generateChart);

                    function generateChart() {
                        var ww = selector.attr('width', $(container).width());
                        switch (type) {
                            default:
                                new Chart(ctx, {
                                    type: 'line',
                                    data: data,
                                    options: options
                                });
                                break;

                        }

                    };
                    generateChart();
                },
                //init
                ChartJs.prototype.init = function() {
                    //creating lineChart
                    var lineChart = {
                        labels: @json($chartdata['dates']),
                        datasets: [{
                            label: "Daily Registered Users",
                            fill: false,
                            lineTension: 0.5,
                            backgroundColor: "rgba(35, 203, 224, 0.2)",
                            borderColor: "#23cbe0",
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            pointBorderColor: "#23cbe0",
                            pointBackgroundColor: "#fff",
                            pointBorderWidth: 1,
                            pointHoverRadius: 5,
                            pointHoverBackgroundColor: "#23cbe0",
                            pointHoverBorderColor: "#23cbe0",
                            pointHoverBorderWidth: 2,
                            pointRadius: 1,
                            pointHitRadius: 10,
                            data: @json($chartdata['count'])
                        }, ]
                    };

                    var lineOpts = {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    max: {{ $chartdata['max'] }},
                                    min: {{ $chartdata['min'] }},
                                    stepSize: {{ $chartdata['step'] }}
                                }
                            }]
                        }
                    };

                    this.respChart($("#lineChart"), 'Line', lineChart, lineOpts);
                },
                $.ChartJs = new ChartJs, $.ChartJs.Constructor = ChartJs
        }(window.jQuery),

        //initializing
        function($) {
            "use strict";
            $.ChartJs.init()
        }(window.jQuery);
    </script>
@endpush
