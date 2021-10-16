@extends('layouts.admin')
@section('title')
    Thêm Logo
@endsection
@section('contents')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Logo</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.logos.index') }}">Danh sáchLogo</a>
            </li>
            <li class="breadcrumb-item">Thêm mới Logo</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm mới Logo</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{ Route('admin.logos.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold">Ảnh Logo</label>
                        <input class="form-control" type="file" name="image"
                            placeholder="Chọn ảnh...">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                   
                    <div class="form-group">
                        <label class="font-weight-bold">Trạng thái</label>
                        <select class="mt-3 form-control" name="status">
                            <option value="0">
                                Đang hoạt động
                            </option>
                            <option value="1">
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
