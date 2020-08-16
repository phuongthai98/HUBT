@extends('home.Home.layout_default')

@section('content')
    <div class="container">
        @include('home.Home.Notification')
    </div>
    <div class="container" style="min-height: 400px">
        <div class="col-md-5 row">
            @if(!empty(Auth::guard('home')->user()))
                <form action="{{route('post-order')}}" method="POST" role="form">
                    <legend>Thông tin đặt hàng</legend>
                    @csrf
                    <div class="form-group">
                        <label for="">Tên <i style="color: red">(*)</i></label>
                        <input type="text" class="form-control" value="{{Auth::guard('home')->user()->full_name}}" name="name" placeholder="Vui lòng nhập tên bạn..">
                    </div>
                    <div class="form-group">
                        <label for="">Email <i style="color: red">(*)</i></label>
                        <input type="text" class="form-control" value="{{Auth::guard('home')->user()->email}}" name="email" required="" placeholder="Địa chỉ email..">
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại <i style="color: red">(*)</i></label>
                        <input type="number" class="form-control" value="{{Auth::guard('home')->user()->phone}}" name="phone" placeholder="Vui lòng nhập..">
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ <i style="color: red">(*)</i></label>
                        <input type="text" class="form-control" value="{{Auth::guard('home')->user()->address}}" name="address" placeholder="Địa chỉ nhận hàng..">
                    </div>
                    <a href="{{route('cart')}}" class="btn btn-primary">Quay lại giỏ hàng</a>
                    <button type="submit" class="btn btn-primary">Đặt hàng</button>
                </form>
            @else
                <form action="{{route('post-order')}}" method="POST" role="form">
                    <legend>Thông tin đặt hàng</legend>
                    @csrf
                    <div class="form-group">
                        <label for="">Tên <i style="color: red">(*)</i></label>
                        <input type="text" class="form-control" name="name" placeholder="Vui lòng nhập tên bạn..">
                    </div>
                    <div class="form-group">
                        <label for="">Email <i style="color: red">(*)</i></label>
                        <input type="text" class="form-control" name="email" required="" placeholder="Địa chỉ email..">
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại <i style="color: red">(*)</i></label>
                        <input type="number" class="form-control" name="phone" placeholder="Vui lòng nhập..">
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ <i style="color: red">(*)</i></label>
                        <input type="text" class="form-control" name="address" placeholder="Địa chỉ nhận hàng..">
                    </div>
                    <a href="{{route('cart')}}" class="btn btn-primary">Quay lại giỏ hàng</a>
                    <button type="submit" class="btn btn-primary">Đặt hàng</button>
                </form>
            @endif
        </div>
        <div class="col-md-7">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Mã SP</th>
                    <th>Ảnh</th>
                    <th>Tên SP</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cart->items as $k => $item)
                    <tr>
                        <td>{{$item['id']}}</td>
                        <td>
                            <img src="{{URL::asset('')}}upload/product/{{$item['image']}}" width="60px">
                        </td>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['price']}} VNĐ</td>
                        <td>{{$item['quantity']}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
