@extends('layouts.admin')
@section('title')
    Thêm mới bài viế<textarea name="" id="" cols="30" rows="10"></textarea>
@endsection
@section('contents')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Bài viết</li>
            <li class="breadcrumb-item"><a href="{{route('admin.blogs.index')}}">Danh sách bài viết</a> </li>
            <li class="breadcrumb-item">Thêm mới bài viết</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm mới bài viết</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{route('admin.blogs.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold">Tiêu đề bài viết</label>
                        <input class="form-control" type="text" name="title" placeholder="Nhập tiêu đề bài viết ..." value="{{old('title')}}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Ảnh</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input"  name="image" value="{{ old('image') }}">
                            <label class="custom-file-label" for="customFile" >Chọn ảnh ...</label>
                            </div>
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
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
                        <label class="font-weight-bold">Chi tiết</label>
                        <textarea name="detail" id="detail" class="form-control ckeditor"></textarea>
                        <script>
                            CKEDITOR.replace('detail');
                            var data = CKEDITOR.instances.detail.getData();
                        </script>
                        @error('detail')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- Cate_id --}}
                    <div class="form-group">
                        <label class="font-weight-bold">Danh mục bài viết</label>
                        <select class="mt-3 form-control" name="cate_id">
                            @foreach ($cateBlog as $item)
                            <option value="{{$item->id}}">
                                {{$item->name}}
                            </option>
                            @endforeach
                            @error('cate_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>
                    {{-- status --}}
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
