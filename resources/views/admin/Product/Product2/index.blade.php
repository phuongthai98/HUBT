@extends('admin.Admin.index')


@section('content')

    <div class="container">
        <h3 class="text-center">Phụ Kiện</h3>
        <a class="pull-left btn btn-warning" href="{{action('admin\Product2@create',[])}}" style="padding-right: 50px;"><i
                class="glyphicon glyphicon-plus"></i>Thêm mới</a>
    </div>
    <div class="container-fluid">
        <div class="clearfix  pull-right" style="margin-right: 100px">
            {{$data->render()}}
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
                    <th>Ảnh sản phẩm</th>
                    <th>Giá sản phẩm</th>
                    <th>Giá khuyến mãi</th>
                    <th>Hãng sản xuất</th>
                    <th>Trạng thái</th>
                    <th>Nhóm Sản phẩm</th>
                    <th>Mô tả</th>
                    <th width="200px">Chi tiết sản phẩm</th>
                    <th>Tùy Chọn</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $v)
                    <tr>
                        <td>{{$v->product_name}}</td>
                        <td>
                            <img src="{{URL::asset('')}}upload/product/{{$v->image}}" width="60px" alt="">
                        </td>
                        <td>{{$v->product_price}}</td>
                        <td>{{$v->sale_price}}</td>
                        <td>{{$v->category_id}}</td>
                        <td>{{$v->status}}</td>
                        <td>{{$v->group_category_id}}</td>
                        <td style="overflow: auto;max-width: 100px;white-space: nowrap;">{{$v->description}}</td>
                        <td style="overflow:auto;width: 250px;display: block;max-width: 100px;white-space: nowrap;">{{$v->content}}</td>
                        <td>
                            <form action="{{action('admin\Product2@destroy',[$v->id])}}" method="post" role="form">
                                @method('DELETE')
                                @csrf
                                <a href="{{action('admin\Product2@show',[$v->id])}}" class="btn btn-primary"><i
                                        class="glyphicon glyphicon-eye-open"></i> Xem</a>
                                <a href="{{action('admin\Product2@edit',[$v->id])}}" class="btn btn-primary"><i
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
        @endif</div>
@stop
