@extends('admin.Admin.index')


@section('content')
    <div class="container">
        <div>
            <h3>Thêm Mới Banner</h3>
        </div>


        <div class="col-md-6">
            <form action="{{action('admin\Banner@store',[])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Tên banner</label>
                    <input type="text" class="form-control" name="name" placeholder="Nhập tên banner"
                           required="required">
                </div>
                <div class="form-group">
                    <label for="">Link banner</label>
                    <input type="text" class="form-control" name="link" placeholder="Đường dẫn banner"
                           required="required">
                </div>
                <div class="form-group">
                    <label for="">Trạng thái sản phẩm</label>
                    <select name="status" id="input" class="form-control">
                        <option value="1">Kích hoạt</option>
                        <option value="0">Không kích hoạt</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Hình ảnh</label>
                    <input type="file" name="image">
                </div>

                <button class="btn btn-primary" type="submit">Thêm mới</button>
                <a href="{{action('admin\Banner@index',[])}}" class="btn btn-danger">Hủy bỏ</a>

            </form>
        </div>
    </div>

@stop
