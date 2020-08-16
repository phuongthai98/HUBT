@extends('admin.Admin.index')


@section('content')
    <div>
        <h3>Thêm Mới Nhóm Danh Mục</h3>
    </div>


    <div class="col-md-6">
        <form action="{{action('admin\GroupCategory@store',[])}}" method="POST"
              onsubmit="button.disabled = true; return true;">
            @csrf
            <div class="form-group">
                <label for="">Tên Nhóm danh mục</label>
                <input type="text" class="form-control" name="gr_cat_name" placeholder="Nhập tên nhóm danh mục">
            </div>
            <div class="form-group">
                <label for="">Trạng thái danh mục</label>
                <select name="status" id="input" class="form-control" required="required">
                    <option value="1">Kích hoạt</option>
                    <option value="0">Không kích hoạt</option>
                </select>
            </div>
            <button class="btn btn-primary" type="submit" name="button">Thêm mới</button>
            <a href="{{action('admin\GroupCategory@index',[])}}" class="btn btn-danger">Hủy bỏ</a>

        </form>
    </div>

@stop
