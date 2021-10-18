@extends('layouts.admin')
@section('title')
    Sửa Logo
@endsection
@section('contents')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Logo</li>
        <li class="breadcrumb-item"><a href="{{route('admin.cate_services.index')}}">Danh sách Logo</a> </li>
        <li class="breadcrumb-item">Sửa Logo</li>
    </ol>
</nav>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sửa Logo</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <form method="POST" action="{{route('admin.logos.update', ['logo' => $logo])}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold">Ảnh Logo</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input"  name="image" value="{{$logo->image}}" >
                        <label class="custom-file-label" for="customFile" >Chọn ảnh ...</label>
                        </div>
                    <div class="mt-2">
                        @if ($logo->image)
                        <img src="{{ asset('uploads/' . $logo->image) }}" width="200px" height="150px">
                        @endif
                    </div>
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
              
                <div class="form-group">
                    <label class="font-weight-bold">Trạng thái</label>
                    <select class="mt-3 form-control" name="status">
                        <option value="0" {{ $logo->status == 0 ? 'selected' : '' }} >
                            Đang hoạt động
                        </option>
                        <option value="1" {{ $logo->status == 1 ? 'selected' : '' }}>
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