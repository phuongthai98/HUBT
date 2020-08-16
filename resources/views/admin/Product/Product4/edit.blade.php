@extends('admin.Admin.index')


@section('content')
    <div class="container">
        <div>
            <h3>Chỉnh Sửa Sản Phẩm</h3>
        </div>


        <div class="col-md-6">
            <form action="{{action('admin\Product4@update',[$data->id])}}" method="POST" enctype="multipart/form-data"
                  onsubmit="button.disabled = true; return true;">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="pro_name" value="{{$data->product_name}}"
                           placeholder="Nhập tên sản phẩm" required="required">
                </div>
                <input type="hidden" name="group1" class="form-control" value="8">
                <div class="form-group">
                    <label for="">Giá sản phẩm</label>
                    <input type="number" class="form-control" name="price" value="{{$data->product_price}}"
                           required="required">
                </div>
                <div class="form-group">
                    <label for="">Giá khuyến mãi</label>
                    <input type="number" class="form-control" name="sale_price" value="{{$data->sale_price}}">
                </div>
                <input type="hidden" name="group2" class="form-control" value="22">
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
                    <label for="">Mô tả</label>
                    <input type="text" class="form-control" name="description" value="{{$data->description}}"
                           placeholder="Mô tả sản phẩm" required="required">
                </div>
                <div class="form-group">
                    <label for="">Nội dung</label>
                    <input type="text" class="form-control" name="content" value="{{$data->content}}"
                           placeholder="Nội dung sản phẩm" required="required">
                </div>
                <div class="form-group">
                    <label for="">Hình ảnh sản phẩm</label>
                    <input type="file" name="image">
                    <img src="{{url('')}}/public/upload/product/{{$data->image}}" width="60px" alt="">
                </div>

                <button class="btn btn-primary" type="submit" name="button">Cập nhật</button>
                <a href="{{action('admin\Product4@index',[])}}" class="btn btn-danger">Hủy bỏ</a>

            </form>
        </div>
    </div>

@stop
