@extends('layouts.admin')
@section('title')
    Danh sách thông tin liên hệ
@endsection
@section('contents')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Liên hệ</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.contacts.index') }}"> Danh sách liên hệ</a>
            </li>
        </ol>
    </nav>
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <h6 class="m-0 font-weight-bold text-primary">Danh sách thông tin liên hệ</h6>
        </div>
    @section('search-form')
        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto  ml-md-3 my-2 my-md-0 mw-100 navbar-search"
            action="{{ route('admin.contacts.index') }}" method="GET">
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
    @endsection

    @if (!empty($data))
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Tên khách hàng</td>
                            <td>Số điện thoại</td>
                            <td>Nội dung</td>
                            <td>Trạng thái</td>
                            <td>Hành động</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone_number }}</td>
                                <td>{{ $item->note }}</td>
                                <td>
                                    @if ($item->status == 0)
                                        <a href="{{route('admin.contacts.statusContact', ['id' => $item->id, 'status' => 1]) }}"
                                            class="btn btn-primary btn-sm ">Đã liên hệ</a>
                                    @else
                                        <a href="{{route('admin.contacts.statusContact', ['id' => $item->id, 'status' => 0]) }}"
                                            class="btn btn-danger btn-sm">Chưa liên hệ</a>
                                    @endif
                                </td>
                                <td> 
                                    <a href="{{ route('admin.contacts.edit', ['contact' => $item->id]) }}"
                                        class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas  fa-edit"></i>
                                    </a>
                                    <a data-toggle="modal" class="btn btn-danger btn-circle btn-sm"
                                        data-target="#confirm_delete_{{ $item->id }}"><i
                                            class="fas fa-trash"></i></a>

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
                                                        action="{{ route('admin.contacts.delete', ['contact' => $item->id]) }}">
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
        </div>
    @else
        <h2>Không có dữ liệu</h2>
    @endif
@endsection
