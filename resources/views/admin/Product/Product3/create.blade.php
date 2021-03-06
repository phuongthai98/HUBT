@extends('admin.Admin.index')


@section('content')
    <div class="container">
        <div>
            <h3>Thêm Mới Sản Phẩm</h3>
        </div>


        <div class="col-md-6">
            <form action="{{action('admin\Product3@store',[])}}" method="POST" enctype="multipart/form-data"
                  onsubmit="button.disabled = true; return true;">
                @csrf
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="pro_name" placeholder="Nhập tên sản phẩm"
                           required="required">
                </div>
                <input type="hidden" name="group1" class="form-control" value="7">
                <div class="form-group">
                    <label for="">Giá sản phẩm</label>
                    <input type="number" class="form-control" name="price" required="required">
                </div>
                <div class="form-group">
                    <label for="">Giá khuyến mãi</label>
                    <input type="number" class="form-control" name="sale_price">
                </div>
                <input type="hidden" name="group2" class="form-control" value="21">
                <input type="hidden" value="1" name="status">
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <input type="text" class="form-control" name="description" placeholder="Mô tả sản phẩm"
                           required="required">
                </div>
                <div class="form-group">
                    <label for="">Nội dung</label>
                    <input type="text" class="form-control" name="content" placeholder="Nội dung sản phẩm"
                           required="required">
                </div>
                <div class="form-group">
                    <label for="">Hình ảnh sản phẩm</label>
                    <input type="file" name="image">
                </div>

                <button class="btn btn-primary" type="submit" name="button">Thêm mới</button>
                <a href="{{action('admin\Product3@index',[])}}" class="btn btn-danger">Hủy bỏ</a>

            </form>
        </div>
    </div>

@stop
