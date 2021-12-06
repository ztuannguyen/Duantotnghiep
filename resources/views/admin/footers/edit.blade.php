@extends('layouts.admin')
@section('title')
    Sửa thông tin liên hệ
@endsection
@section('contents')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Liên hệ</li>
        <li class="breadcrumb-item"><a href="{{route('admin.footers.index')}}">Danh sách liên hệ</a> </li>
        <li class="breadcrumb-item">Sửa thông tin liên hệ</li>
    </ol>
</nav>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sửa thông tin liên hệ</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <form method="POST" action="{{route('admin.footers.update', ['footer' => $footer])}}">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold">Email</label>
                    <input class="form-control" type="email" name="email" value="{{$footer->email}}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Hotline</label>
                    <input class="form-control" type="text" name="hotline" value="{{$footer->hotline}}">
                    @error('hotline')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Description</label>
                    <input class="form-control" type="text" name="description" value="{{$footer->description}}">
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Fanpage</label>
                    <input class="form-control" type="text" name="fanpage" value="{{$footer->fanpage}}">
                    @error('fanpage')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                 <div class="form-group">
                    <label class="font-weight-bold">Trạng thái</label>
                    <select class="mt-3 form-control" name="status">
                        <option value="0" >
                            Đang hoạt động
                        </option>
                        <option value="1">  
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