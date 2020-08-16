@extends('admin.Admin.index')

@section('content')
    <div class="container">
        <h3 class="text-center">Quản lý vai trò</h3>
        <div class="col-md-2">
            <a class="btn btn-warning" href="{{action('admin\Roles@create')}}">Tạo mới</a>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th class="col-md-6 text-center">Tên vai trò</th>
                <th class="col-md-6"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $v)
                <tr>
                    <td class="col-md-6 text-center"><label class="badge label-success">{{$v->name}}</label></td>
                    <td class="col-md-6 pull-right">
                        <form action="{{action('admin\Roles@destroy',[$v->id])}}" method="post" role="form">
                            @method('DELETE')
                            @csrf
                            <a href="{{action('admin\Roles@show',[$v->id])}}" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i> Xem</a>
                            <a href="{{action('admin\Roles@edit',[$v->id])}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Sửa</a>
                            <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
