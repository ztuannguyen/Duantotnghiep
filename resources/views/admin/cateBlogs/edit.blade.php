@extends('layouts.admin')
@section('title')
    Sửa danh mục bài viết
@endsection
@section('contents')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Bài viết</li>
        <li class="breadcrumb-item"><a href="{{route('admin.cateBlogs.index')}}">Danh sách danh mục bài viết</a> </li>
        <li class="breadcrumb-item">Sửa danh mục bài viết</li>
    </ol>
</nav>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sửa danh mục bài viết</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <form method="POST" action="{{route('admin.cateBlogs.update', ['blogCate' => $blogCate])}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold">Tên danh mục bài viết</label>
                    <input class="form-control" type="text" name="name" value="{{$blogCate->name}}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label class="font-weight-bold">Trạng thái</label>
                    <select class="mt-3 form-control" name="status">
                        <option value="0" {{ $blogCate->status == 0 ? 'selected' : '' }} >
                            Đang hoạt động
                        </option>
                        <option value="1" {{ $blogCate->status == 1 ? 'selected' : '' }}>
                            Dừng hoạt động
                        </option >
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