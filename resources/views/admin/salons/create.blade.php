@extends('layouts.admin')
@section('title')
    Thêm mới cửa hàng
@endsection
@section('contents')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Danh sách cửa hàng</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.salons.index') }}">Cửa hàng</a> </li>
            <li class="breadcrumb-item">Thêm mới cửa hàng</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm mới cửa hàng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{ route('admin.salons.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold">Tên cửa hàng</label>
                        <input class="form-control" type="text" name="name_salon" value="{{ old('name_salon') }}">
                        @error('name_salon')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Địa chỉ</label>
                        <input class="form-control" type="text" name="address" value="{{ old('address') }}">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Ảnh</label>
                        <input class="form-control" type="file" name="image" value="{{ old('image') }}">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Mô tả</label>
                        <input class="form-control" type="text" name="description" value="{{ old('description') }}">
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
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
                    </div>
                    <button type="submit" class="btn btn-success">Thêm</button>
                </form>

            </div>
        </div>
    </div>
@endsection