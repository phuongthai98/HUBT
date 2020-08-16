@extends('home.Home.layout_default')
@section('title')
    Máy tính
@stop
@section('content')
    <div class="container">
        @include('home.Home.Notification')
    </div>
    <div class="container" style="min-height: 400px">
        <div class="col-md-6">
            <form action="{{route('sign-up-post')}}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Tên</label>
                    <input type="text" class="form-control" value="{{old('name')}}" name="" placeholder="Nhập tên đăng nhập">
                </div>
                <div class="form-group">
                    <label for="">Tên đầy đủ</label>
                    <input type="text" class="form-control" value="{{old('full_name')}}" name="full_name" placeholder="Nhập tên đầy đủ">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" value="{{old('email')}}" name="email" placeholder="Email..">

                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password..">

                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control" value="{{old('address')}}" name="address" placeholder="Input...">
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="number" class="form-control" value="{{old('phone')}}" name="phone" placeholder="Input...">
                </div>
                <div class="form-group">
                    <label for="">Avatar</label>
                    <input type="file" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Đăng ký</button>
                <a href="{{ route('home') }}" class="btn btn-danger">Hủy</a>
            </form>
        </div>
    </div>
@stop
