@extends('layouts.admin')
@section('title')
Sửa thông tin người dùng
@endsection
@section('contents')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
       <li class="breadcrumb-item">Người dùng</li>
        {{-- <li class="breadcrumb-item"><a href="{{route('admin.cate_services.index')}}">Danh mục dịch vụ</a> </li>  --}}
        <li class="breadcrumb-item">Sửa thông tin người dùng</li>
    </ol>
</nav>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sửa thông tin người dùng</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <form method="POST" action="{{Route('admin.users.update',['user'=>$user])}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold">Tên người dùng</label>
                    <input class="form-control" type="text" name="name" placeholder="Nhập tên người dùng ..." value="{{$user->name}}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Số điện thoại</label>
                    <input class="form-control" type="text" name="number_phone" placeholder="Nhập số điện thoại ..." value="{{$user->number_phone}}">
                    @error('number_phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Mật khẩu</label>
                    <input class="form-control" type="text" name="pass" placeholder="Nhập mật khẩu ..." value="{{$user->pass}}">
                    @error('pass')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Mã otp</label>
                    <input class="form-control" type="text" name="otp" placeholder="Nhập mã OTP ..." value="{{$user->otp}}">
                    @error('otp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="add-product-preview-img">

                        <img src="{{asset( 'uploads/' . $user->image)}}" width="70" />
        
                    </div>
                    <label class="font-weight-bold">Ảnh</label>
                    
                
                        <div class="form-group">
                          <label for="exampleFormControlFile1">Example file input</label>
                          <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1" value="{{$user->image}}">
                        </div>
                   
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Vai trò</label>
                    <select class="mt-3 form-control" name="role_id">
                        <option value="{{$user->role_id}}">{{$user->roles->name}}</option>
                        <option disabled>-----</option>
                        @foreach ($roles as $r)
                        
                        <option value="{{$r->id}}">
                            {{$r->name}}
                        </option>
                        @endforeach
                       
                       
                        @error('role_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </select>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">ratings</label>
                    <input class="form-control" type="text" name="ratings"  value="{{$user->ratings}}">
                    @error('ratings')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
               
                <button type="submit" class="btn btn-success">Sửa</button>
            </form>

        </div>
    </div>
</div>
@endsection