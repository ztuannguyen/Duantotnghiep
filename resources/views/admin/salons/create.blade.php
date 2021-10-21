@extends('layouts.admin')
@section('title')
    Thêm mới chi nhánh
@endsection
@section('contents')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Danh sách chi nhánh</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.salons.index') }}">Chi nhánh</a> </li>
            <li class="breadcrumb-item">Thêm mới chi nhánh</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm mới chi nhánh</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{ route('admin.salons.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold">Tên chi nhánh</label>
                        <input class="form-control" type="text" name="name_salon" value="{{ old('name_salon') }}" placeholder="Nhập tên chi nhánh ...">
                        @error('name_salon')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Số ghế</label>
                        <input class="form-control" type="text" name="slot_amount" value="{{ old('slot_amount') }}" placeholder="Nhập số ghế ...">
                        @error('slot_amount')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Địa chỉ</label>
                        <input class="form-control" type="text" name="address" value="{{ old('address') }}" placeholder="Nhập địa chỉ ...">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Ảnh</label>
                        <div class="custom-file">
                        <input type="file" class="custom-file-input"  name="image" value="{{ old('image') }}" >
                        <label class="custom-file-label" for="customFile" >Chọn ảnh ...</label>
                        </div>
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Mô tả</label>
                        <input class="form-control" type="text" name="description" value="{{ old('description') }}" placeholder="Nhập mô tả ...">
                        <script>
                            CKEDITOR.replace('description');
                            var data = CKEDITOR.instances.detail.getData();
                        </script>
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
