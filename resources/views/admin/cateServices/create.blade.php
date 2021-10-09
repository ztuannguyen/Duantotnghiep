@extends('layouts.admin')
@section('title')
    Danh mục dịch vụ
@endsection
@section('contents')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dịch vụ</li>
        <li class="breadcrumb-item"><a href="{{route('admin.cate_services.index')}}">Danh sách danh mục dịch vụ</a> </li>
        <li class="breadcrumb-item">Thêm mới danh mục dịch vụ</li>
    </ol>
</nav>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm mới danh mục dịch vụ</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <form method="POST" action="{{Route('admin.cate_services.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold">Tên danh mục dịch vụ</label>
                    <input class="form-control" type="text" name="name_cate" placeholder="Nhập tên danh mục dich vụ mới ...">
                    @error('name_cate')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Order_by</label>
                    <input class="form-control" type="number" name="order_by">
                    @error('order_by')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Trạng thái</label>
                    <select class="mt-3 form-control" name="status">
                        <option value="1">
                            Đang hoạt động
                        </option>
                        <option value="0">
                            Dừng hoạt động
                        </option >
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