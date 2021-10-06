@extends('layouts.admin')
@section('title')
    Danh sách người dùng
@endsection
@section('contents')

    {{-- <div class="row">



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

            @foreach ($users as $p)
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
</div> --}}

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Dịch vụ</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}"> Danh sách người dùng</a>
            </li>
        </ol>
    </nav>
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <a href="{{ Route('admin.users.create') }}" class="btn btn-success  ">

                <span class="text">Thêm mới</span>
            </a>
            <!-- Topbar Search -->
            {{-- <form action="" method="get">
                <div class="row">
                    <div class="col-6">
        
        
                        <div class="form-group">
                            <label for="">Tên người dùng</label>
                            <input class="form-control" type="text" name="keyword" @isset($searchData['keyword'])
                                value="{{ $searchData['keyword'] }}" @endisset>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Sắp xếp theo</label>
                            <select class="form-control" name="order_by">
                                <option value="0">Mặc định</option>
                                <option @if (isset($searchData['order_by']) && $searchData['order_by'] == 1) selected @endif value="1">Tên alphabet</option>
                                <option @if (isset($searchData['order_by']) && $searchData['order_by'] == 2) selected @endif value="2">Tên giảm dần alphabet</option>
                                <option @if (isset($searchData['order_by']) && $searchData['order_by'] == 3) selected @endif value="3">Vai trò tăng dần</option>
                                <option @if (isset($searchData['order_by']) && $searchData['order_by'] == 4) selected @endif value="4">Vai trò giảm dần</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                        </div>
                    </div>
                </div>
            </form> --}}
            <form class="d-none d-sm-inline-block form-inline mr-auto  ml-md-3 my-2 my-md-0 mw-100 navbar-search"
                action="{{ route('admin.users.index') }}" method="GET">
                <div class="input-group">
                        <input class="form-control bg-light  small" placeholder="Tìm kiếm..." aria-describedby="basic-addon2"
                         type="text" aria-label="Search" name="keyword" @isset($searchData['keyword'])
                                value="{{ $searchData['keyword'] }}" @endisset>
               
                                <div class="form-group" style="margin-right:30px;">
                                    <label for="" style="margin-left:30px "> Sắp xếp theo</label>
                                    <select class="form-control" name="order_by" style="margin-left:10px ">
                                        <option value="0">Mặc định</option>
                                        <option @if (isset($searchData['order_by']) && $searchData['order_by'] == 1) selected @endif value="1">Tên alphabet</option>
                                        <option @if (isset($searchData['order_by']) && $searchData['order_by'] == 2) selected @endif value="2">Tên giảm dần alphabet</option>
                                        <option @if (isset($searchData['order_by']) && $searchData['order_by'] == 3) selected @endif value="3">Vai trò tăng dần</option>
                                        <option @if (isset($searchData['order_by']) && $searchData['order_by'] == 4) selected @endif value="4">Vai trò giảm dần</option>
                                    </select>
                                </div>
                                <div class="input-group-append">
                        <button class="btn btn-primary">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if (!empty($users))
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <td>STT</td>
                        <td>Tên</td>
                        <td>Vai trò</td>
                        <td>Ảnh</td>
                        <td>Số điện tdoại</td>
                        <td>Chức năng</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $p)
            <tr>
            <td>{{(($users->currentPage()-1)*6) +   $loop->iteration}}</td>
                <td>{{$p->name }}</td>
                <td>{{$p->roles->name }}</td>
                <td><img src="{{asset( 'uploads/' . $p->image)}}" width="70" /></td>
                
                <td>{{$p->number_phone}}</td>
                            <td> <a href="{{route('admin.users.edit', ['user' => $p->id])}}"
                                    {{-- {{ route('admin.salons.edit', ['salon' => $p->id]) }} --}} class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas  fa-edit"></i>
                                </a>
                                <a data-toggle="modal" class="btn btn-danger btn-circle btn-sm"
                                    data-target="#confirm_delete_{{ $p->id }}"><i class="fas fa-trash"></i></a>

                                <div class="modal fade" id="confirm_delete_{{ $p->id }}" tabindex="-1"
                                    role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn có chắc muốn xóa không?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Cancel</button>

                                                <form method="GET"
                                                    action="{{ route('admin.users.remove', ['id' => $p->id]) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <h2>Không có dữ liệu</h2>
    @endif
@endsection
