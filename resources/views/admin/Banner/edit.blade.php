@extends('admin.Admin.index')


@section('content')
    <div class="container">
        <div>
            <h3>Chỉnh Sửa Banner</h3>
        </div>
        <div class="col-md-6">
            <form action="{{action('admin\Banner@update',[$data->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Tên banner</label>
                    <input type="text" class="form-control" name="name" value="{{$data->banner_name}}"
                           placeholder="Nhập tên sản phẩm" required="required">
                </div>
                <div class="form-group">
                    <label for="">Đường dẫn banner</label>
                    <input type="text" class="form-control" name="link" value="{{$data->link}}"
                           placeholder="Nhập tên sản phẩm" required="required">
                </div>

                <div class="form-group">
                    <label for="">Trạng thái sản phẩm</label>
                    <?php $a = $data->status ?>
                    @if($a == 1)
                        <select name="status" id="input" class="form-control">
                            <option value="1">Kích hoạt</option>
                            <option value="0">Không kích hoạt</option>
                        </select>
                    @else
                        <select name="status" id="input" class="form-control">
                            <option value="0">Không kích hoạt</option>
                            <option value="1">Kích hoạt</option>
                        </select>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Hình ảnh sản phẩm</label>
                    <input type="file" name="image">
                    <img src="{{url('')}}/public/upload/banner/{{$data->image}}" width="60px" alt="">
                </div>

                <button class="btn btn-primary" type="submit">Xác nhận</button>
                <a href="{{action('admin\Banner@index',[])}}" class="btn btn-danger">Hủy bỏ</a>

            </form>
        </div>
    </div>

@stop
