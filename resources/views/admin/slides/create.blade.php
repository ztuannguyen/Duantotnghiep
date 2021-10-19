@extends('layouts.admin')
@section('title')
    Thêm mới slide
@endsection
@section('contents')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Slide</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.slides.index') }}">Danh sách slide</a>
            </li>
            <li class="breadcrumb-item">Thêm mới slide</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm mới Slide</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{ Route('admin.slides.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold">Ảnh Slide</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" value="{{ old('image')}}">
                            <label class="custom-file-label">Choose file...</label>
                          </div>
                    </div>
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
