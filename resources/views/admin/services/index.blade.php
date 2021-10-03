@extends('layouts.admin')
@section('title')
    Danh mục dịch vụ
@endsection
@section('contents')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Dịch vụ </li>
            <li class="breadcrumb-item"><a href="{{route('admin.services.index')}}">Danh sách dịch vụ </a> </li>
        </ol>
    </nav>
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <a href="{{route('admin.services.create')}}" class="btn btn-success  ">

                <span class="text">Thêm mới</span>
            </a>
            <!-- Topbar Search -->
            <form class="d-none d-sm-inline-block form-inline mr-auto  ml-md-3 my-2 my-md-0 mw-100 navbar-search" 
            action="{{ route('admin.services.index') }}"
                method="GET">
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
                        <td>ID</td>
                        <td>Tên dịch vụ</td>
                        <td>Giá</td>
                        <td>cate_id</td>
                        <td>execution_time</td>
                        <td>discount</td>
                        <td>description	</td>
                        <td>detail</td>
                        <td>image</td>
                        <td>total_time</td>
                        <td>status</td>
                        <td>order_by</td>
                        <td>Chức năng</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->cateService->name_cate }}</td>
                            <td>{{ $item->execution_time }}</td>
                            <td>{{ $item->discount }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->detail}}</td>
                            <td><img src="{{ asset('uploads/' . $item->image) }}" width="70" height="70" alt=""></td>
                            <td>{{ $item->total_time }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->order_by }}</td>
                            <td> <a href="{{route('admin.services.edit', ['service' => $item->id])}}"
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

                                                <form method="GET"
                                                    action="{{route('admin.services.delete',['service' => $item->id])}}">
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
