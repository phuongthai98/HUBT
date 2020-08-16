@extends('admin.Admin.index')


@section('content')
    <div class="container">
        <h3 class="text-center">Bàn Gaming</h3>
        <a class="pull-left btn btn-warning" href="{{action('admin\Category4@create',[])}}"
           style="padding-right: 50px; padding-bottom: 10px"><i class="glyphicon glyphicon-plus"></i>Thêm mới</a>
    </div>
    <div class="container">
        @if($data->isempty())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Xin lỗi, dữ liệu trống!</strong>
            </div>
        @else
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Tên Hãng sản xuất</th>
                    <th>Trạng thái</th>
                    <th>Tùy Chọn</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                    <tr>
                        <td>{{$v->category_name}}</td>
                        <td>{{$v->status}}</td>
                        <td>
                            <form action="{{action('admin\Category4@destroy',[$v->id])}}" method="post" role="form">
                                @method('DELETE')
                                @csrf
                                <a href="{{action('admin\Category4@edit',[$v->id])}}" class="btn btn-primary"><i
                                        class="glyphicon glyphicon-edit"></i> Sửa</a>

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
    </div>

@stop
