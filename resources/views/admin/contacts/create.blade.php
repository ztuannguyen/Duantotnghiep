@extends('layouts.admin')
@section('title')
    Thêm thông tin liên hệ
@endsection
@section('contents')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Liên hệ</li>
        <li class="breadcrumb-item"><a href="{{route('admin.contacts.index')}}">Danh sách liên hệ</a> </li>
        <li class="breadcrumb-item">Thêm mới liên hệ</li>
    </ol>
</nav>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm mới liên hệ</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <form method="POST" action="{{Route('admin.contacts.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold">Tên khách hàng</label>
                    <input class="form-control" type="text" name="name" placeholder="Nhập tên khách hàng ...">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Số điện thoại</label>
                    <input class="form-control" type="tel" name="phone_number" placeholder="Nhập số điện thoại ...">
                    @error('phone_number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Nội dụng</label>
                    <input class="form-control" type="text" name="note" placeholder="Nhập nội dung ...">
                    @error('note')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Trạng thái</label>
                    <select class="mt-3 form-control" name="status">
                        <option value="0">
                            Đã liên hệ
                        </option>
                        <option value="1">  
                            Chưa liên hệ
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