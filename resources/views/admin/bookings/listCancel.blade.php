@extends('layouts.admin')
@section('title')
    Danh sách lịch đã hủy
@endsection
@section('contents')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Đặt lịch</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.bookings.listCancel') }}"> Danh sách lịch đã hủy </a>
            </li>
        </ol>
    </nav>
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <div class="row">

                <div class="col-3 mt-2">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <h5 class="m-0 font-weight-bold text-primary">Danh sách lịch đã hủy</h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Mã hóa đơn</td>
                            <td>Tên khách hàng</td>
                            <td>Số điện thoại</td>
                            <td>Chi nhánh</td>
                            <td>Thời gian</td>
                            <td>Ngày đặt</td>
                            <td>Lí do hủy đơn</td>
                            <td>Trạng thái</td>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($booking as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>#{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->number_phone }}</td>
                                {{-- <td>{{ $item->service->name }}</td> --}}
                                <td>{{ $item->Salon->address }}</td>
                                <td>{{ date('H:i:s', strtotime($item->time_start)) }}</td>
                                <td>{{ $item->date_booking }}</td>
                                <td>{{$item->reason}}</td>
                                <td>
                                    @if ($item->status == 5)
                                        <span class="badge badge-danger p-3">Hủy lịch </span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.bookings.restore', ['id' => $item->id]) }}"
                                        class="btn btn-info btn-circle btn-sm">
                                        <i class="fas  fa-undo"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
