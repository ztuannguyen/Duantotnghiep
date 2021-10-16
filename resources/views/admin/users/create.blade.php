@extends('layouts.admin')
@section('title')
    Thêm mới người dùng
@endsection
@section('contents')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Tài khoản</li>
        <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Danh mục tài khoản</a> </li>
        <li class="breadcrumb-item">Thêm mới tài khoản</li>
    </ol>
</nav>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm mới tài khoản</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <form method="POST" action="{{Route('admin.users.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold">Tên người dùng</label>
                    <input class="form-control" type="text" name="name" placeholder="Nhập tên người dùng ...">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Số điện thoại</label>
                    <input class="form-control" type="text" name="number_phone" placeholder="Nhập số điện thoại ...">
                    @error('number_phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Mật khẩu</label>
                    <input class="form-control" type="text" name="pass" placeholder="Nhập mật khẩu ...">
                    @error('pass')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Mã OTP</label>
                    <input class="form-control" type="text" name="otp" placeholder="Nhập mã OTP ...">
                    @error('otp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Ảnh</label>
                    <input class="form-control" type="file" name="image">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Vai trò</label>
                    <select class="mt-3 form-control" name="role_id">
                        <option value="1">
                            Đang hoạt động
                        </option>
<option value="2" }}>
                            Dừng hoạt động
                        </option>
                        @error('role_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </select>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Xếp hạng</label>
                    <input class="form-control" type="text" name="ratings" placeholder="Nhập thứ tự xếp hạng ...">
                    @error('ratings')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Thêm</button>
            </form>

        </div>
    </div>
</div>
@endsection