@extends('layouts.admin')
@section('title')
    Sửa dịch vụ
@endsection
@section('contents')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Dịch vụ</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">Danh sách dịch vụ</a> </li>
            <li class="breadcrumb-item">Sửa dịch vụ</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sửa dịch vụ</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{ route('admin.services.update', ['service' => $service]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- name --}}
                    <div class="form-group">
                        <label class="font-weight-bold">Tên dịch vụ</label>
                        <input class="form-control" type="text" name="name" value="{{ $service->name }}"
                            placeholder="Nhập tên dịch vụ ...">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- price --}}
                    <div class="form-group">
                        <label class="font-weight-bold">Giá</label>
                        <input class="form-control" type="text" name="price" value="{{ $service->price }}"
                            placeholder="Nhập giá ...">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- image --}}
                    <div class="form-group">
                        <label class="font-weight-bold">Ảnh</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" value="{{ $service->image }}">
                            <label class="custom-file-label" for="customFile">Chọn ảnh ...</label>
                            <div>
                                <div class="mt-2">
                                    @if ($service->image)
                                        <img src="{{ asset('uploads/' . $service->image) }}" width="150px" height="100px">
                                    @endif
                                </div>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- execution_time --}}
                            <div class="form-group">
                                <label class="font-weight-bold">Thời gian thực hiện</label>
                                <input class="form-control" type="number" name="execution_time"
                                    value="{{ $service->execution_time }}" placeholder="Nhập thời gian ...">Phút
                                @error('execution_time')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- discount --}}
                            <div class="form-group">
                                <label class="font-weight-bold">discount</label>
                                <input class="form-control" type="text" name="discount" value="{{ $service->discount }}"
                                    placeholder="">
                                @error('discount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- description --}}
                            <div class="form-group">
                                <label class="font-weight-bold">Mô tả</label>
                                <textarea name="description" id="description"
                                    class="form-control ckeditor">{{ $service->description }}</textarea>
                                <script>
                                    CKEDITOR.replace('description');
                                    var data = CKEDITOR.instances.description.getData();
                                </script>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- detail --}}
                            <div class="form-group">
                                <label class="font-weight-bold">Chi tiết</label>
                                <textarea name="detail" id="detail"
                                    class="form-control ckeditor">{{ $service->detail }}</textarea>
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
                                <label class="font-weight-bold">Danh mục dịch vụ</label>
                                <select class="mt-3 form-control" name="cate_id">
                                    @foreach ($cateService as $item)
                                        <option {{ $item->id == $service->name_cate ? 'selected' : '' }}
                                            value="{{ $item->id }}">
                                            {{ $item->name_cate }}
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
                                    <option value="0" {{ $service->status == 0 ? 'selected' : '' }}>
                                        Đang hoạt động
                                    </option>
                                    <option value="1" {{ $service->status == 1 ? 'selected' : '' }}>
                                        Dừng hoạt động
                                    </option>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </select>
                            </div>
                            {{-- order_by --}}
                            <div class="form-group">
                                <label class="font-weight-bold">Order_by</label>
                                <input class="form-control" type="number" name="order_by"
                                    value="{{ $service->order_by }}">
                                @error('order_by')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Sửa</button>

                </form>

            </div>
        </div>
    </div>
@endsection
