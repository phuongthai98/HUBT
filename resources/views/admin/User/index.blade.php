@extends('admin.Admin.index')


@section('content')
    <div class="container-fluid">
        <h3 class="text-center">Quản lý Người Dùng</h3>
        <a class="pull-left btn btn-warning" href="{{action('admin\User@create',[])}}"
           style="padding-right: 50px; padding-bottom: 10px"><i class="glyphicon glyphicon-plus"></i>Thêm mới</a>
    </div>

    <div class="hr-dash"></div>

    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>id</th>
            <th>Tên tài khoản</th>
            <th>Tên đầy đủ</th>
            <th>Ảnh đại diện</th>
            <th>Vai trò</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Trạng thái</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $v)
            <tr>
                <td>{{$v->id}}</td>
                <td>{{$v->name}}</td>
                <td>{{$v->full_name}}</td>
                <td>
                    @if(!empty($v->avatar))
                        <img width="60px" src="{{URL::asset('')}}upload/avatar/{{$v->avatar}}">
                    @else
                        Không có ảnh
                    @endif
                </td>
                <td>
                    @if(!$v->getRoleNames()->isEmpty())
                        @foreach($v->getRoleNames() as $role)
                            <label class="badge label-success">{{ $role }}</label>
                        @endforeach
                    @else
                        <label class="badge">Tài khoản thường</label>
                    @endif
                </td>
                <td>{{$v->email}}</td>
                <td>{{$v->address}}</td>
                <td>{{$v->phone}}</td>
                <td>{{$v->status}}</td>
                <td>
                    <form action="{{action('admin\User@destroy',[$v->id])}}" method="post" role="form">
                        @method('DELETE')
                        @csrf
                        <a href="{{action('admin\User@show',[$v->id])}}" class="btn btn-primary"><i
                                class="glyphicon glyphicon-eye-open"></i> Xem</a>
                        <a href="{{action('admin\User@edit',[$v->id])}}" class="btn btn-primary"><i
                                class="glyphicon glyphicon-pencil"></i> Sửa</a>
                        <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="clearfix  pull-right" style="margin-right: 100px">
        {{$data->render()}}
    </div>
@stop
