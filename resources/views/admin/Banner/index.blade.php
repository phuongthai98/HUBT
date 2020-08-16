@extends('admin.Admin.index')


@section('content')

    <div class="container">
        <h3 class="text-center">Quản lý Banner</h3>
        <a class="pull-left btn btn-warning" href="{{action('admin\Banner@create',[])}}"
           style="padding-right: 50px; padding-bottom: 10px"><i class="glyphicon glyphicon-plus"></i>Thêm mới</a>
    </div>
    @if($data->isempty())
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Xin lỗi, dữ liệu trống!</strong>
        </div>
    @else
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Ảnh banner</th>
                <th>Đường dẫn của sản phẩm</th>
                <th>Trạng thái</th>
                <th>Tùy Chọn</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $v)
                <tr>
                    <td>{{$v->banner_name}}</td>
                    <td>
                        <img src="{{URL::asset('')}}upload/banner/{{$v->image}}" width="260px">
                    </td>
                    <td>{{$v->link}}</td>
                    <td>{{$v->status}}</td>
                    <td>
                        <form action="{{action('admin\Banner@destroy',[$v->id])}}" method="post" role="form">
                            @method('DELETE')
                            @csrf
                            <a href="{{action('admin\Banner@show',[$v->id])}}" class="btn btn-primary"><i
                                    class="glyphicon glyphicon-eye-open"></i> Xem</a>
                            <a href="{{action('admin\Banner@edit',[$v->id])}}" class="btn btn-primary"><i
                                    class="glyphicon glyphicon-pencil"></i> Sửa</a>
                            <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
    <div class="clearfix  pull-right" style="margin-right: 100px">
        {{$data->render()}}
    </div>

@stop
