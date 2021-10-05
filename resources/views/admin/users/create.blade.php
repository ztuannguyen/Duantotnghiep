@extends('layouts.admin')
@section('title')
    Thêm mới người dùng
@endsection
@section('contents')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        {{-- <li class="breadcrumb-item">Danh mục</li>
        <li class="breadcrumb-item"><a href="{{route('admin.cate_services.index')}}">Danh mục dịch vụ</a> </li> --}}
        <li class="breadcrumb-item">Thêm mới người dùng</li>
    </ol>
</nav>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm mới người dùng</h6>
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
                    <label class="font-weight-bold">Mã otp</label>
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
                    <label class="font-weight-bold">ratings</label>
                    <input class="form-control" type="text" name="ratings" placeholder="Nhập raitings ...">
                    @error('ratings')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label class="font-weight-bold">Trạng thái</label>
                    <select class="mt-3 form-control" name="status">
                        <option value="{{ config('common.salon.status.dang_hoat_dong') }}"
                            {{ old('status'), config('common.salon.status.dang_hoat_dong') == config('common.salon.status.dang_hoat_dong') ? 'selected' : '' }}>
                            Đang hoạt động
                        </option>
                        <option value=" {{ config('common.salon.status.dung_hoat_dong') }}"
                            {{ old('status'), config('common.salon.status.dung_hoat_dong') == config('common.salon.status.dung_hoat_dong') ? 'selected' : '' }}>
                            Dừng hoạt động
                        </option>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
@enderror
                    </select>
                </div> --}}
                <button type="submit" class="btn btn-success">Thêm</button>
            </form>

        </div>
    </div>
</div>
@endsection