@extends('admin.Admin.index')


@section('content')
    <div class="container">
        <h3 class="text-center">Quản lý Nhóm Danh Mục</h3>
        <a class="pull-left btn btn-warning" href="{{action('admin\GroupCategory@create',[])}}"
           style="padding-right: 50px; padding-bottom: 10px"><i class="glyphicon glyphicon-plus"></i>Thêm mới
        </a>
        <a class="pull-right btn btn-warning" href="">
            <i class="glyphicon glyphicon-download-alt"></i> Download PDF
        </a>
    </div>

    <div class="container">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Tên Nhóm danh mục</th>
                <th>Trạng thái</th>
                <th>Tùy Chọn</th>
            </tr>
            </thead>
            <tbody>
            @foreach($gr as $v)
                <tr>
                    <td>{{$v->category_group_name}}</td>
                    <td>{{$v->status}}</td>
                    <td>
                        <form action="{{action('admin\GroupCategory@destroy',[$v->id])}}" method="post" role="form">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="clearfix  pull-right" style="margin-right: 100px">
            {{$gr->render()}}
        </div>
    </div>
@stop
