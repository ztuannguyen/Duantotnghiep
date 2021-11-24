@extends('layouts.admin')
@section('title')
    Thêm ghế làm
@endsection
@section('contents')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Ghế làm</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.chairs.index') }}">Danh sách ghế làm</a>
            </li>
            <li class="breadcrumb-item">Thêm mới ghế làm</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm mới ghế làm</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{ Route('admin.chairs.store') }}">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold">Tên ghế</label>
                        <input class="form-control" type="text" name="name" placeholder="Nhập tên ghế ...">
                        @error('name')
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
