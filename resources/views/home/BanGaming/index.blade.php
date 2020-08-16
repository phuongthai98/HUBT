@extends('home.Home.layout_default')
@section('title')
    Bàn Gaming
@stop
@section('content')
    <div class="container" style="min-height: 400px">
        <div class="col-md-3 row">
            @include('home.Home.menu-item')
        </div>
        <div class="col-md-9" style="margin: 10px 0; min-height: 333px">
            @foreach($data as $v)
                <div class="col-md-4 thai">
                    <a href="{{route('detail',['id' => $v->id])}}">
                        <img src="{{URL::asset('')}}upload/product/{{$v->image}}" alt=""
                             title="{{$v->description}}" style="width: 212px;height: 212px">
                    </a>
                    <a href="{{route('detail',['id' => $v->id])}}">
                        <h4 title="{{$v->product_name}}"
                            style="overflow:hidden;text-overflow: ellipsis;width: 212px;display: block;white-space: nowrap;">{{$v->product_name}}</h4>
                    </a>
                    <p><span class="glyphicon glyphicon-star-empty"></span><span
                            class="glyphicon glyphicon-star-empty"></span><span
                            class="glyphicon glyphicon-star-empty"></span><span
                            class="glyphicon glyphicon-star-empty"></span><span
                            class="glyphicon glyphicon-star"></span>11 Reviews</p>
                    @if(isset($v->sale_price))
                        <div class="col-md-10" style="height: 38px">
                            <div style="position: absolute;top: -10px">
                                <s>{{number_format($v->product_price)}}</s> VNĐ
                                <p style="font-weight: 1000;font-size:20px;color: red; margin: 0px">{{number_format($v->sale_price)}}
                                    VNĐ</p>
                            </div>
                        </div>
                    @else
                        <p style="font-weight: 1000; font-size: 20px"
                           class="col-md-10">{{number_format($v->product_price)}}
                            VNĐ</p>
                    @endif
                    <a title="Đặt hàng" class="btn btn-warning col-md-2" style="padding: 0"
                       href="{{route('cart.add',['id' => $v->id])}}">
                        <i class="glyphicon glyphicon-shopping-cart" style="font-size: 20px;color: #fff"></i>
                    </a>
                    <div class="tren-hot">
                        <img style="width: 50px" src="https://appletravel.vn/assets/images/hot.gif" alt="">
                    </div>
                    <div class="zom">
                        <a href="#"><span class="glyphicon glyphicon-fullscreen"></span></a>
                    </div>
                </div>
            @endforeach
            <div class="clear-fix">
                {{$data->render()}}
            </div>
        </div>
    </div>
@stop
