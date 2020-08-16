@extends('admin.Admin.index')


@section('content')
    <div>
        <h3>Chỉnh sửa hãng sản xuất</h3>
    </div>


    <div class="col-md-6">
        <form action="{{action('admin\Category4@update',[$data->id])}}" method="POST"
              onsubmit="button.disabled = true; return true;">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Tên hãng sản xuất</label>
                <input type="text" class="form-control" name="cat_name" value="{{$data->category_name}}"
                       placeholder="Nhập tên danh mục" required="required">
            </div>
            <div class="form-group">
                <label for="">Nhóm danh mục</label>
                <input type="number" class="form-control" value="8" name="group_category" readonly>
            </div>
            <div class="form-group">
                <label for="">Trạng thái</label>
                <?php $b = $data->status ?>
                @if($b == 1)
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
            <button class="btn btn-primary" type="submit" name="button">Cập nhật</button>
            <a href="{{action('admin\Category4@index',[])}}" class="btn btn-danger">Hủy bỏ</a>

        </form>
    </div>

@stop
