@extends('admin.Admin.index')
@section('content')
    <div class="container">
        <h3>Thông tin chi tiết</h3>

        <dl>
            <dt>Tên tài khoản:</dt>
            <dd>{{$data->name}}</dd>
            <dt>Tên đầy đủ:</dt>
            <dd>{{$data->full_name}}</dd>
            <dt>Email:</dt>
            <dd>{{$data->email}}</dd>
            <dt>Địa chỉ:</dt>
            <dd>{{$data->address}}</dd>
            <dt>Số điện thoại:</dt>
            <dd>{{$data->phone}}</dd>
            <dt>Vai trò:</dt>
            <dd>
                @if(!$data->getRoleNames()->isEmpty())
                    @foreach($data->getRoleNames() as $v)
                        <label class="badge label-success">{{$v}}</label>
                    @endforeach
                @else
                    <label class="badge">Tài khoản thường</label>
                @endif
            </dd>
            <dt>Trạng thái:</dt>
            <dd>
                @if($data->status == 1)
                    <label class="badge label-success">Kích hoạt</label>
                @else
                    <label class="badge label-success">Không kích hoạt</label>
                @endif
            </dd>
        </dl>
    </div>
    <div class="container">
        <a href="{{ url()->previous() }}" class="btn btn-primary">Quay lại</a>
    </div>
@endsection
