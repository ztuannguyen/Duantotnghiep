@extends('layouts.admin')
@section('title')
    Danh sách người dùng
@endsection
@section('contents')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Người dùng</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}"> Danh sách người dùng</a>
            </li>
        </ol>
    </nav>
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <!-- Sidebar Toggle (Topbar) -->

            <a href="{{ Route('admin.users.create') }}" class="btn btn-success  ">

                <span class="text">Thêm mới</span>
            </a>
        </div>
    @section('search-form')
        <form class="d-none d-sm-inline-block form-inline mr-auto  ml-md-3 my-2 my-md-0 mw-100 navbar-search"
            action="{{ route('admin.users.index') }}" method="GET">
            <div class="input-group">
                <input class="form-control bg-light  small" placeholder="Tìm kiếm..." aria-describedby="basic-addon2"
                    type="text" aria-label="Search" name="keyword" @isset($searchData['keyword'])
                    value="{{ $searchData['keyword'] }}" @endisset>
                <div class="input-group-append">
                    <button class="btn btn-primary">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    @endsection
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;margin-left:20px">
            {{ session('message') }}
        </div>
    @endif
    @if (!empty($users))
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>STT</td>
                            <td>Tên</td>
                            <td>Ảnh</td>
                            <td>Số điện thoại</td>
                            <td>Vai trò</td>
                            <td>Chức năng</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $p)
                            <tr>
                                <td>{{ ($users->currentPage() - 1) * 6 + $loop->iteration }}</td>
                                <td>{{ $p->name }}</td>
                                <td><img src="{{ asset('uploads/' . $p->image) }}" width="100" height="100" /></td>

                                <td>{{ $p->number_phone }}</td>
                                <td>
                                    <div class="form-group">
                                        @if ($p->role_id == 1 ? 'selected' : '')
                                            <button type="button" class="btn btn-success btn-xs btn-radius">Nhân
                                                viên</button>
                                        @elseif($p->role_id == 2 ? 'selected' : '' )
                                            <button type="button" class="btn btn-danger btn-xs btn-radius">Quản
                                                lý</button>
                                        @endif
                                    </div>
                                </td>
                                <td> <a href="{{ route('admin.users.edit', ['user' => $p->id]) }}"
                                        class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas  fa-edit"></i>
                                    </a>
                                    <a data-toggle="modal" class="btn btn-danger btn-circle btn-sm"
                                        data-target="#confirm_delete_{{ $p->id }}"><i
                                            class="fas fa-trash"></i></a>

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
                <div>{{ $users->links() }}</div>
            </div>
        </div>

    @else
        <h2>Không có dữ liệu</h2>
    @endif
</div>
@endsection
