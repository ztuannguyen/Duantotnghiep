@extends('layouts.admin')
@section('title')
    Quản lí cửa hàng
@endsection
@section('contents')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Danh sách chi nhánh</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.salons.index') }}">Cửa hàng</a> </li>
        </ol>
    </nav>
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <a href="/admin/salons/create" class="btn btn-success  ">
                
                <span class="text">Thêm mới</span>
            </a>
            <!-- Topbar Search -->
            <form class="d-none d-sm-inline-block form-inline mr-auto  ml-md-3 my-2 my-md-0 mw-100 navbar-search"
                action="{{ route('admin.salons.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control bg-light  small" placeholder="Tìm kiếm..." aria-label="Search"
                        aria-describedby="basic-addon2" name="keyword" value="{{ old('keyword') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if (!empty($data))
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Tên cửa hàng</td>
                        <td>Địa chỉ</td>
                        <td>Ảnh cửa hàng</td>
                        <td>Mô tả</td>
                        <td>Trạng thái</td>
                        <td colspan="2">Hành động</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name_salon }}</td>
                            <td>{{ $item->address }}</td>
                            <td><img src="{{ asset('uploads/' . $item->image) }}" width="150" height="100" ></td>
                            <td>{{$item->description}}</td>
                            <td>
                                <div class="form-group">
                                    
                                        <label class="btn btn-success btn-sm" >{{ $item->status ? 'ON' : 'OFF' }}</label>
                                </div>
                            </td>
                            <td> <a href="{{ route('admin.salons.edit', ['salon' => $item->id]) }}"
                                    class="btn btn-warning btn-circle btn-sm">
                                    <i class="fas  fa-edit"></i>
                                </a>
                                <a data-toggle="modal" class="btn btn-danger btn-circle btn-sm"
                                    data-target="#confirm_delete_{{ $item->id }}"><i class="fas fa-trash"></i></a>

                                <div class="modal fade" id="confirm_delete_{{ $item->id }}" tabindex="-1"
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

                                                <form method="POST"
                                                    action="{{ route('admin.salons.delete', ['salon' => $item->id]) }}">
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
