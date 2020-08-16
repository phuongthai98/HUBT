@extends('admin.Admin.index')

@section('content')
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
                    <th class="text-center">Đã bán(chiếc)</th>
                    <th class="text-center">Lượt xem(lượt)</th>
                </tr>
                </thead>
                <tbody>
                @foreach($chart_sum as $v)
                    <tr>
                        <td>{{$v->product_name}}</td>
                        <td class="text-center">{{$v->quantity}}</td>
                        <td class="text-center">{{$v->view}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>




    <script type="text/javascript">
        Highcharts.chart('container', {
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'BIỂU ĐỒ KẾT HỢP'
            },
            subtitle: {
                text: ' '
            },
            xAxis: [{
                categories: [
                    @foreach($chart_sum as $v)
                        "{{$v->product_name}}",
                    @endforeach
                ],
                crosshair: true
            }],
            yAxis: [{ // Primary yAxis
                labels: {
                    format: '{value} chiếc',
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
                },
                title: {
                    text: 'Số lượt xem',
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
                }
            }, { // Secondary yAxis
                title: {
                    text: 'Số lượng đã bán',
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                },
                labels: {
                    format: '{value} chiếc',
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                },
                opposite: true
            }],
            tooltip: {
                shared: true
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                x: -10,
                verticalAlign: 'top',
                y: 310,
                floating: true,
                backgroundColor:
                    Highcharts.defaultOptions.legend.backgroundColor || // theme
                    'rgba(255,255,255,0.25)'
            },
            series: [{
                name: 'Số lượng bán ra',
                type: 'column',
                yAxis: 1,
                data: [
                    @foreach($chart_sum as $v)
                    {{$v->quantity}},
                    @endforeach
                ],
                tooltip: {
                    valueSuffix: ''
                }

            }, {
                name: 'Lượt xem',
                type: 'spline',
                data: [
                    @foreach($chart_sum as $v)
                    {{$v->view}},
                    @endforeach
                ],
                tooltip: {
                    valueSuffix: ''
                }
            }]
        });
    </script>
@stop
