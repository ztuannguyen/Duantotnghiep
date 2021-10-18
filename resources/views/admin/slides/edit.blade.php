@extends('layouts.admin')
@section('title')
    Sửa ảnh slide
@endsection
@section('contents')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dịch vụ</li>
        <li class="breadcrumb-item"><a href="{{route('admin.cate_services.index')}}">Danh sách ảnh slide</a> </li>
        <li class="breadcrumb-item">Sửa ảnh slide</li>
    </ol>
</nav>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sửa ảnh slide</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <form method="POST" action="{{Route('admin.slides.update', ['slide' => $slide])}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold">Ảnh</label>
                    <input class="form-control" type="file" name="image" value="{{$slide->image}}">
                    <div >
                        @if ($slide->image)
                        <img src="{{ asset('uploads/' . $slide->image) }}" width="150" height="100" alt="">
                        @endif
                    </div>
                    @error('image_slide')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Trạng thái</label>
                    <select class="mt-3 form-control" name="status">
                        <option value="0" {{ $slide->status == 0 ? 'selected' : '' }} >
                            Đang hoạt động
                        </option>
                        <option value="1" {{ $slide->status == 1 ? 'selected' : '' }}>
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