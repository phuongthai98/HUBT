@extends('admin.Admin.index')

@section('content')
    <div class="container">
        <h3 class="text-center">Top 20 máy tính có nhiều lượt xem nhất trong tháng</h3>
    </div>
    <figure class="highcharts-figure">
        <div id="container"></div>
        <p class="highcharts-description">
        </p>
    </figure>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Tên Sản Phẩm</th>
                    <th class="text-center">Lượt xem(lượt)</th>
                </tr>
                </thead>
                <tbody>
                @foreach($view as $v)
                    <tr>
                        <td>{{$v->product_name}}</td>
                        <td class="text-center">{{$v->view}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>

    <script type="text/javascript">
        // Create the chart
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: ''
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: ''
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}%'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> trên tổng số lượt xem trong tháng<br/>'
            },

            series: [
                {
                    name: "Lượt xem",
                    colorByPoint: true,
                    data: [
                            @foreach($view as $v)
                        {
                            name: "{{$v->product_name}}",
                            y: {{$v->view/$sum_view*100}},
                            drilldown: " "
                        },
                        @endforeach
                    ]
                }
            ],
        });
    </script>
@stop
