@extends('home.Home.layout_default')
@section('title')
    Home
@stop

@section('content')
    @include('home.Home.banner')
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
                    @foreach($data as $v)
                        <div class="item item-product">
                            <a href="{{route('detail',['id' => $v->id])}}">
                                <img data-src="#" src="{{URL::asset('')}}upload/product/{{$v->image}}"
                                     style="width: 285px; height: 285px" title="{{$v->description}}">
                            </a>
                            <a href="" id="ifo-item-product">
                                <span class="glyphicon glyphicon-fullscreen"></span>
                            </a>
                            <a href="#">
                                <h5 title="{{$v->product_name}}"
                                    style="overflow:hidden;text-overflow: ellipsis;width: 212px;display: block;white-space: nowrap;">
                                    {{$v->product_name}}
                                </h5>
                            </a>
                            @if(isset($v->sale_price))
                                <div class="col-md-12">
                                    <div class="col-md-6" style="padding: 0">
                                        <s>{{number_format($v->product_price)}}</s> VNĐ |
                                    </div>
                                    <div class="col-md-6" style="padding: 0">
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

    <div class="banner-img">
        <div class="container ">
            <div class="row banner1" style="box-shadow: 0px 35px 50px -50px">
                <img src="{{URL::asset('')}}Home/images/banner-1.jpg" alt="" style="width: 100%">
            </div>
        </div>
    </div>

    <div class="best-seller" style="margin: 20px 0">
        <div class="container">
            <div class="row">
                <div class="bs-left">
                    <h3>Sản phẩm</h3>
                </div>
                <div class="bs-right"></div>
            </div>
        </div>
    </div>
    <div class="product-sell">
        <div class="container">
            <div class="phan">
                <div class="phan1 thai">
                    @foreach($top1 as $v)
                        <img style="padding: 10px"
                             src="{{URL::asset('')}}upload/product/{{$v->image}}"
                             alt="">
                        <a href="#">
                            <h4 style="height: 100px;line-height: 30px">
                                {{$v->product_name}}
                            </h4>
                        </a>
                        <p><span class="glyphicon glyphicon-star-empty"></span><span
                                class="glyphicon glyphicon-star-empty"></span><span
                                class="glyphicon glyphicon-star-empty"></span><span
                                class="glyphicon glyphicon-star-empty"></span><span
                                class="glyphicon glyphicon-star"></span>9
                            Reviews</p>
                        @if(empty($v->sale_price))
                            <h4 style="font-weight: 1000;font-size: 26px">{{number_format($v->product_price)}} VNĐ</h4>
                        @else
                            <h4 style="font-weight: 1000;font-size: 26px"><s>{{number_format($v->product_price)}} VNĐ</s></h4>
                            <h4 style="font-weight: 1000;font-size: 26px; color: red">{{number_format($v->sale_price)}} VNĐ</h4>
                        @endif

                        <div class="new">
                            <img style="width: 80px"
                                 src="https://cdn4.iconfinder.com/data/icons/flat-color-sale-tag-set/512/Accounts_label_promotion_sale_tag_6-512.png"
                                 alt="">
                        </div>
                        <div class="zom">
                            <a href="#"><span class="glyphicon glyphicon-fullscreen"></span></a>
                        </div>

                        <a href="{{route('cart.add',['id' => $v->id])}}" class="btn btn-default button">Thêm vào giỏ hàng</a>
                        <div class="phan1-icon">
                            <a href="#" id=""><span class="glyphicon glyphicon-heart"></span></a>
                            <a href="#" id=""><span class="glyphicon glyphicon-stats"></span></a>
                        </div>
                    @endforeach
                </div>
                <div class="phan2">
                    <div class="tren">
                        @foreach($product1 as $v)
                            <div class="tren1 thai">
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
                                <h4 style="font-weight: 700" class="col-md-10">{{number_format($v->product_price)}}
                                    VNĐ</h4>
                                <a title="Đặt hàng" class="btn btn-warning col-md-2" style="padding: 0"
                                   href="{{route('cart.add',['id' => $v->id])}}">
                                    <i class="glyphicon glyphicon-shopping-cart"
                                       style="font-size: 20px;color: #fff"></i>
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
                    <div class="duoi">
                        @foreach($product2 as $v)
                            <div class="duoi1 thai">
                                <a href="{{route('detail',['id' => $v->id])}}">
                                    <img src="{{URL::asset('')}}upload/product/{{$v->image}}"
                                         title="{{$v->description}}" style="width: 212px;height: 212px">
                                </a>
                                <a href="{{route('detail',['id' => $v->id])}}">
                                    <h4 title="{{$v->product_name}}"
                                        style="overflow:hidden;text-overflow: ellipsis;width: 212px;display: block;white-space: nowrap;">{{$v->product_name}}</h4>
                                </a>
                                <span class="glyphicon glyphicon-star-empty"></span><span
                                    class="glyphicon glyphicon-star-empty"></span><span
                                    class="glyphicon glyphicon-star-empty"></span><span
                                    class="glyphicon glyphicon-star"></span>9 Reviews</p>
                                <h4 style="font-weight: 700" class="col-md-10">{{number_format($v->product_price)}}
                                    VNĐ</h4>
                                <a title="Đặt hàng" class="btn btn-warning col-md-2" style="padding: 0"
                                   href="{{route('cart.add',['id' => $v->id])}}">
                                    <i class="glyphicon glyphicon-shopping-cart"
                                       style="font-size: 20px; color: #fff"></i>
                                </a>
                                <div class="zom">
                                    <a href="#"><span class="glyphicon glyphicon-fullscreen"></span></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
@stop
