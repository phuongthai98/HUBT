@extends('home.Home.layout_default')
@section('title')
    Chi tiết sản phẩm
@stop
@section('content')
    <div class="container" style="min-height: 400px">
        <div class="col-md-3 row">
            @include('home.Home.menu-item')
        </div>
        <div class="col-md-9">
            <div class="col-md-6" style="padding-top: 30px; z-index: -10px">
                <img src="{{URL::asset('')}}upload/product/{{$data->image}}" alt="" style="width: 400px; padding: 10px;">
            </div>
            <div class="col-md-6">
                <div class="col-md-12">
                    <h3 style="height:100px;">{{$data->product_name}}</h3>
                </div>
                <div class="col-md-12">
                    <p style="height: 150px; overflow: auto">{{$data->content}}</p>
                </div>
                <div class="col-md-12">
                    <div class="col-md-9">
                        @if($data->sale_price == null || $data->sale_price < 1)
                            <h3>Giá: {{number_format($data->product_price)}} VNĐ</h3>
                        @else
                            <s style="font-size: 26px">{{number_format($data->product_price)}}</s> VNĐ
                            <h3 style="color: red;">{{number_format($data->sale_price)}} VNĐ</h3>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-warning thai" title="Đặt hàng" href="{{route('cart.add',['id' => $data->id])}}">
                            <i style="font-size: 20px;color: #fff;" class="glyphicon glyphicon-shopping-cart"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="option-feature">
        <div class="container">
            <div class="row">
                <div class="feature">
                    <h3>Sản phẩm được yêu thích nhất trong tháng</h3>
                    <div class="hr" style="width: 300px"></div>
                    <ul>
                        <li>
                            <a href="" style="border: 2px solid #FFD333; border-radius: 15px;">Tất cả</a>
                        </li>
                        <li>
                            <a href="#">Laptop</a>
                        </li>
                        <li>
                            <a href="#">Phụ kiện</a>
                        </li>
                    </ul>
                    <div class="feature-btn"><span class="glyphicon glyphicon-menu-left"></span></div>
                    <div class="feature-btn"><span class="glyphicon glyphicon-menu-right"></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="list-product" style="margin: 20px 0">
        <div class="container">
            <div class="row">
                <div class="owl-two owl-carousel owl-theme">
                    @foreach($data2 as $v)
                        <div class="item item-product">
                            <a href="{{route('detail',['id' => $v->id])}}">
                                <img data-src="#" src="{{URL::asset('')}}upload/product/{{$v->image}}"
                                     style="width: 285px; height: 285px" title="{{$v->description}}">
                            </a>
                            <a href="" id="ifo-item-product">
                                <span class="glyphicon glyphicon-fullscreen"></span>
                            </a>
                            <a href="#">
                                <h5 title="{{$v->product_name}}" style="overflow:hidden;text-overflow: ellipsis;width: 212px;display: block;white-space: nowrap;">
                                    {{$v->product_name}}
                                </h5>
                            </a>
                            @if(isset($v->sale_price))
                                <div class="col-md-12">
                                    <div class="col-md-6"  style="padding: 0">
                                        <s>{{number_format($v->product_price)}}</s> VNĐ |
                                    </div>
                                    <div class="col-md-6"  style="padding: 0">
                                        <p style="font-weight: 1000; font-size: 16px;color: red; padding: 0">
                                            {{number_format($v->sale_price)}} VNĐ
                                        </p>
                                    </div>
                                </div>

                            @else
                                <p style="font-weight: 1000; font-size: 16px;">
                                    {{number_format($v->product_price)}} VNĐ
                                </p>
                            @endif
                            <div class="tren-hot">
                                <img style="width: 50px"
                                     src="https://batdongsangroup.vn/wp-content/uploads/2018/03/hot-icon.gif" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="option-feature">
        <div class="container">
            <div class="row">
                <div class="feature">
                    <h3>Sản phẩm cùng loại</h3>
                    <div class="hr" style="width: 300px"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        @foreach($like_type as $v)
            <div class="col-md-4 thai" style="margin: 10px 0; min-height: 333px;">
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
                    <div class="col-md-10">
                        <s>{{number_format($v->product_price)}}</s> VNĐ
                        <p style="font-weight: 1000;font-size:15px;color: red">{{number_format($v->sale_price)}}
                            VNĐ</p>
                    </div>
                @else
                    <p style="font-weight: 1000; font-size: 20px" class="col-md-10">{{number_format($v->product_price)}}
                        VNĐ</p>
                @endif
                <a title="Đặt hàng" class="btn btn-warning col-md-2" style="padding: 0"
                   href="{{route('cart.add',['id' => $v->id])}}">
                    <i class="glyphicon glyphicon-shopping-cart" style="font-size: 30px;color: #fff"></i>
                </a>
                <div class="tren-hot">
                    <img style="width: 50px" src="https://appletravel.vn/assets/images/hot.gif" alt="">
                </div>
                <div class="zom">
                    <a href="#"><span class="glyphicon glyphicon-fullscreen"></span></a>
                </div>
            </div>
        @endforeach
    </div>
@stop
