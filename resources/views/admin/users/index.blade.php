@extends('layouts.admin')
@section('title')
    Danh sách người dùng
@endsection
@section('contents')
<form action="" method="get">
    <div class="row">
        <div class="col-6">


            <div class="form-group">
                <label for="">Tên người dùng</label>
                <input class="form-control" type="text" name="keyword"  @isset($searchData['keyword']) value="{{$searchData['keyword']}}" @endisset>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Sắp xếp theo</label>
                <select class="form-control" name="order_by">
                    <option value="0">Mặc định</option>
                    <option @if(isset($searchData['order_by']) && $searchData['order_by']==1) selected @endif value="1">Tên alphabet</option>
                    <option @if(isset($searchData['order_by']) && $searchData['order_by']==2) selected @endif value="2">Tên giảm dần alphabet</option>
                    <option @if(isset($searchData['order_by']) && $searchData['order_by']==3) selected @endif value="3">Vai trò tăng dần</option>
                    <option @if(isset($searchData['order_by']) && $searchData['order_by']==4) selected @endif value="4">Vai trò giảm dần</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </div>
    </div>
</form>

<div class="row">



    <table class="table table-striped ">
        <thead>
            <th>STT</th>
            <th>Tên</th>
            <th>Vai trò</th>
            <th>Ảnh</th>
            <th>Số điện thoại</th>
            
            <th>
                <a href="{{route('admin.users.create')}}" class="btn btn-primary">Tạo mới</a>
            </th>

        </thead>
        <tbody>

            @foreach($users as $p)
            <tr>
            <td>{{(($users->currentPage()-1)*6) +   $loop->iteration}}</td>
                <td>{{$p->name }}</td>
                <td>{{$p->roles->name }}</td>
                <td><img src="{{asset( 'uploads/' . $p->image)}}" width="70" /></td>
                
                <td>{{$p->number_phone}}</td>
                
                <td>
                <a href="{{route('admin.users.edit', ['user' => $p->id])}}" class="btn btn-info">Sửa</a>
                    
                <a href="{{route('admin.users.remove', ['id' => $p->id])}}" class="btn btn-danger">Xóa</a></td>

            </tr>
            <tr>


            </tr>
            @endforeach


        </tbody>

    </table>
 <div>
     {{$users->links()}}
 </div>
</div>
@endsection