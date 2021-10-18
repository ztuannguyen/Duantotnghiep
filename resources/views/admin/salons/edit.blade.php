@extends('layouts.admin')
@section('title')
    Sửa thông tin chi nhánh
@endsection
@section('contents')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Danh sách chi nhánh</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.salons.index') }}">Chi nhánh</a> </li>
            <li class="breadcrumb-item">Sửa thông tin chi nhánh</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin chi nhánh</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{ route('admin.salons.update',['salon' =>$salon->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold">Tên cửa hàng</label>
                        <input class="form-control" type="text" name="name_salon" value="{{ $salon->name_salon }}">
                        @error('name_salon')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Địa chỉ</label>
                        <input class="form-control" type="text" name="address" value="{{ $salon->address }}">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Ảnh</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input"  name="image" value="{{ $salon->image }}">
                            <label class="custom-file-label" for="customFile" value="{{ old('image') }}">Chọn ảnh ...</label>
                            </div>
                        <div class="mt-2">
                            @if ($salon->image)
                            <img src="{{ asset('uploads/' . $salon->image) }}" width="170px" height="150px">
                            @endif
                        </div>
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Mô tả</label>
                        <input class="form-control" type="text" name="description" value="{{ $salon->description }}">
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Trạng thái</label>
                        <select class="mt-2 form-control" name="status">
                            <option value="0" {{ $salon->status == 0 ? 'selected' : '' }}>
                                Đang hoạt động
                            </option>
                            <option value="1" {{ $salon->status == 1 ? 'selected' : '' }}>
                                Dừng hoạt động
                            </option>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Sửa</button>
                </form>

            </div>
        </div>
    </div>
@endsection
