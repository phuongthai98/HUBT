@extends('admin.Admin.index')

@section('content')
    <div class="container">
        <h3 class="text-center">Thay đổi thông tin</h3>
        <form action="{{action('admin\User@update',[$data->id])}}" method="post" role="form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Tên tài khoản</label>
                <input type="text" class="form-control" value="{{$data->name}}" name="name"
                       placeholder="Nhập tên đăng nhập">
            </div>
            <div class="form-group">
                <label for="">Tên đầy đủ</label>
                <input type="text" class="form-control" value="{{$data->full_name}}" name="full_name"
                       placeholder="Nhập tên đầy đủ">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" value="{{$data->email}}" name="email" placeholder="Email..">
            </div>
            <div class="form-group">
                <label for="">Địa chỉ</label>
                <input type="text" class="form-control" value="{{$data->address}}" name="address"
                       placeholder="Input...">
            </div>
            <div class="form-group">
                <label for="">Số điện thoại</label>
                <input type="number" class="form-control" value="{{$data->phone}}" name="phone" placeholder="Input...">
            </div>
            <div class="form-group">
                <label for="">Trạng thái: </label>
                <label><input type="checkbox" name="status" value="1" {{($data->status = 1)?'checked':''}}> Kích hoạt</label>
                <label><input type="checkbox" name="status" value="0" {{($data->status = 0)?'checked':''}}> Không kích hoạt</label>
            </div>
            <div class="form-group">
                <label for="">Vai trò</label><br>
                @foreach($role as $v)
                    <input type="checkbox" name="role[]"
                           value="{{$v->id}}" {{in_array($v->name,$data_role->toArray()) ? 'checked' : ''}}>
                    <label>
                        {{$v->name}}
                    </label><br>
                @endforeach
            </div>
            <div class="form-group">
                <label for="">Avatar</label>
                <input type="file" name="image">
                <img src="{{URL::asset('')}}upload/avatar/{{$data->avatar}}" alt="" height="60px">
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{action('admin\User@index',[])}}" class="btn btn-danger">Hủy</a>
        </form>
    </div>
@stop
