@extends('admin.Admin.index')


@section('content')
    <div class="container-fluid">
        <div class="col-md-6">
            <h3>Thêm mới tài khoản</h3>
        </div>
    </div>
    <div class="container">
        <div class="col-md-6">
            <form action="{{action('admin\User@store',[])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Tên tài khoản</label>
                    <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Nhập tên đăng nhập">
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
                    <label for="">Trạng thái</label>
                    <select name="status" class="form-control">
                        <option value=""> -- Chọn một --</option>
                        <option value="1"> -- Kích hoạt --</option>
                        <option value="0"> -- Không kích hoạt --</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Vai trò: </label><br>
                    @foreach($role as $v)
                        <input type="checkbox" name="role[]" value="{{$v->id}}" id=""> {{$v->name}} <br>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="">Avatar</label>
                    <input type="file" name="image">

                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
                <a href="{{action('admin\User@index',[])}}" class="btn btn-danger">Hủy</a>
            </form>
        </div>
    </div>
@stop
