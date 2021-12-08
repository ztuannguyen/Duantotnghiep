@extends('layouts.admin')
@section('title')
    Thêm footer
@endsection
@section('contents')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Footer</li>
        <li class="breadcrumb-item"><a href="{{route('admin.footers.index')}}">Danh sách footer</a> </li>
        <li class="breadcrumb-item">Thêm mới footer</li>
    </ol>
</nav>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm mới footer</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <form method="POST" action="{{ route('admin.footers.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold">Email</label>
                    <input class="form-control" type="email" name="email" placeholder="Nhập email ...">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Hotline</label>
                    <input class="form-control" type="tel" name="hotline" placeholder="Nhập hotline ...">
                    @error('hotline')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Mô tả</label>
                    <textarea name="description" id="description" class="form-control ckeditor"></textarea>
                    <script>
                        CKEDITOR.replace('description');
                        var data = CKEDITOR.instances.description.getData();
                    </script>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Link Fanpage</label>
                    <input class="form-control" type="text" name="fanpage" placeholder="Nhập link fanpage ...">
                    @error('fanpage')
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