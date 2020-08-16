@extends('home.Home.layout_default')
@section('title')
    Giỏ hàng
@stop
@section('content')
    <div class="container">
        @include('home.Home.Notification')
    </div>
    <div class="container" style="min-height: 400px">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>
                    <a href="{{route('cart.clear')}}" class="btn btn-danger">Làm rỗng giỏ hàng</a>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
            @foreach($cart->items as $k => $item)
                <tr>
                    <td>#{{$item['id']}}</td>
                    <td>
                        <img src="{{URL::asset('')}}upload/product/{{$item['image']}}" width="60px">
                    </td>
                    <td>{{$item['name']}}</td>
                    <td>{{number_format($item['price'])}} VND</td>
                    <td>
                        <form action="{{route('cart.update',['id' => $item['id']])}}" method="get" class="form-inline"
                              role="form">
                            <input type="number" style="width: 50px;height: 28px;" name="quantity" value="{{$item['quantity']}}"/>
                            <input type="submit" style="font-size: 10px" class="btn btn-warning" value="Cập nhật"/>
                        </form>
                    </td>
                    <td class="text-center">
                        <a href="{{route('cart.remove',['id'=>$item['id']])}}">
                            <i class="glyphicon glyphicon-trash" style="color:red; font-size: 25px"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
    <div class="container">
        <div class="col-md-6">
            <i class="btn btn-warning">Tổng tiền:</i> {{number_format($cart->total_price)}} (VNĐ)
        </div>
        <div class="col-md-6">
            <a class="btn btn-warning pull-right" href="{{route('order')}}">Đặt hàng</a>
        </div>
    </div>
@stop
