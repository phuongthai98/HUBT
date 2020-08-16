@extends('admin.Admin.index')


@section('content')
    <div >
        <h3>Thêm Mới Danh Mục</h3>
    </div>


    <div class="col-md-6">
        <form action="{{action('admin\Category2@store',[])}}" method="POST" onsubmit="button.disabled = true; return true;">
            @csrf
            <div class="form-group">
                <label for="">Tên danh mục</label>
                <input type="text" class="form-control" name="cat_name" placeholder="Nhập tên danh mục">
            </div>
            <div class="form-group">
                <label for="">Nhóm danh mục</label>
                <input type="number" class="form-control" value="2" name="group_category" readonly>
            </div><div class="form-group">
                <label for="">Trạng thái danh mục</label>
                <select name="status" id="input" class="form-control" required="required">
                    <option value="1">Kích hoạt</option>
                    <option value="0">Không kích hoạt</option>
                </select>
            </div>
            <button class="btn btn-primary" type="submit" name="button">Thêm mới</button>
            <a href="{{action('admin\Category2@index',[])}}" class="btn btn-danger">Hủy bỏ</a>

        </form>
    </div>

@stop
