@extends('layouts.admin')
@section('title')
    Danh sách hàng chờ cắt
@endsection
@section('contents')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Đặt lịch</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.bookings.waitingCut') }}"> Danh sách hàng chờ cắt</a>
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
                    <h5 class="m-0 font-weight-bold text-primary">Danh sách hàng chờ cắt</h5>
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
                            <td>Dịch vụ</td>
                            <td>Ghế làm</td>
                            <td>Chi nhánh</td>
                            <td>Thời gian</td>
                            <td>Ngày đặt</td>
                            <td>Chi tiết</td>
                            <td>Trạng thái</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookingServices as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>#{{ $item->booking->id }}</td>
                                <td>{{ $item->booking->name }}</td>
                                <td>{{ $item->booking->number_phone }}</td>
                                <td>{{ $item->service->name }}</td>
                                <td>
                                    @if ($item->chair_id)
                                        {{ $item->chair->name }}
                                    @endif
                                </td>
                                <td>{{ $item->Salon->address }}</td>
                                <td>{{ date('H:i:s', strtotime($item->time_start)) }}</td>
                                <td>{{ $item->booking->date_booking }}</td>
                                <td><a class="btn btn-primary btn-sm " data-toggle="modal"
                                        data-target="{{ '#' . '_' . $item->id }}">Xem</a></td>
                                <td>
                                    @if ($item->status == 1)
                                        <span class="badge badge-warning p-3 ">Đang chờ cắt </span>
                                    @endif
                                </td>
                            </tr>
                            <!-- Modal chi tiết-->
                            <div class="modal fade" id="{{ '_' . $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #14a08d;color:white">
                                            <h5 class="modal-title" id="staticBackdropLabel">Chi tiết đơn đặt lịch
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="btn btn-info" style="width:100%">
                                                @if ($item->booking->id)
                                                    #{{ $item->booking->id }}
                                                @endif
                                            </p>
                                            <div class="card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-primary">Thông tin khách hàng
                                                    </h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        Tên khách hàng : <b>{{ $item->booking->name }}</b>
                                                    </div>
                                                    <div class="mb-3">
                                                        Số điện thoại : <b>{{ $item->booking->number_phone }} </b>
                                                    </div>
                                                    <div class="mb-3">
                                                        Chi nhánh : <b>{{ $item->salon->address }}</b>
                                                    </div>
                                                    <div class="mb-3">
                                                        Thời gian :
                                                        <b>{{ date('H:i:s', strtotime($item->time_start)) }}</b>
                                                    </div>
                                                    <div>
                                                        Ngày : <b>{{ $item->booking->date_booking }}</b>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-primary">Dịch vụ</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row mb-3" style="border-bottom: 2px solid gray;">
                                                        <div class="col-10">Tên dịch vụ</div>
                                                        <div>Giá</div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-10 mb-3"><b>{{ $item->service->name }}</b>
                                                        </div>
                                                        <div>
                                                            <b>{{ number_format($item->service->price) }}đ</b>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="card-header" style="width:50%;float:right;">
                                                <div class="row mt-2">
                                                    <div class="col-8 ">
                                                        <h6 class="m-0 font-weight-bold text-primary">Tổng tiền :
                                                        </h6>
                                                    </div>
                                                    <div>
                                                        <b>{{ number_format($item->service->price) }}đ</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Đóng</button>
                                            <button type="button" onclick="submit({{ $item->id }})" class="btn btn-primary">Đã xong</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
@section('addScript')
    <script>
        function submit(id) {
            $.ajax({
                type: "post",
                url: "{{ route('admin.bookings.saveWaiting') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                },
                success: function(response) {
                    toarst.success("Lịch cắt đã hoàn thành !");
                    setTimeout(function() {
                        window.location.href = "{{ route('admin.bookings.waitingCut') }}";
                    }, 200);
                }
            });
        }
    </script>
@endsection
