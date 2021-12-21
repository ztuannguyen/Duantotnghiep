@extends('layouts.master')
@section('title')
    Quản lý đơn đặt lịch
@endsection
@section('contents')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('/frontend/images/bg-1.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h2 class="mb-0 bread">Quản lý đơn hàng</h2>
                    <p class="breadcrumbs"> <span class="mr-2"><a href="dich_vu.html">Trang Chủ <i
                                    class="ion-ios-arrow-forward"></i></a></span>
                        <span>Quản Lý Đơn Hàng <i class="ion-ios-arrow-round-forward"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <div class="row content" style="margin-top: 70px; margin-bottom: 50px;">
        <div class="col-sm-12">
            <h1 class="text-center" style="margin-bottom: 20px;">Danh Sách Đơn Hàng Của Bạn</h1>
            <table class="table container p-2">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Mã hóa đơn</th>
                        <th scope="col">Tên Khách Hàng</th>
                        <th scope="col">Chi Nhánh</th>
                        <th scope="col">Chi tiết</th>
                        <th scope="col">Trạng thái</th>
                        @foreach ($booking as $item)
                            @if ($item->status != 1)

                            @else
                                <th scope="col">Hành động</th>
                            @endif
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($booking as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>#{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->salon->address }}</td>
                            <td><a class="btn btn-primary" data-toggle="modal"
                                    data-target="{{ '#' . '_' . $item->id }}"><span class="oi oi-eye"></span></a>
                            </td>
                            <td>
                                @if ($item->status == 1)
                                    <span class="badge badge-danger p-3 ">Chờ xếp lịch </span>
                                @elseif($item->status == 2)
                                    <span class="badge badge-success p-3 ">Đã lên lịch</span>
                                @elseif($item->status == 3)
                                    <span class="badge badge-warning p-3 ">Đang làm</span>
                                @elseif($item->status == 4)
                                    <span class="badge badge-success p-3 ">Đã xong</span>
                                @elseif($item->status == 5)
                                    <span class="badge badge-danger p-3 ">Hủy lịch</span>
                                @endif
                            </td>
                            @if ($item->status == 1)
                                <td>
                                    <a href="#" data-toggle="modal" data-target="{{ '#' . 'cancel_' . $item->id }}"
                                        class="btn btn-warning btn-circle"><i class="oi oi-ban"></i></a>
                                </td>
                            @else
                            @endif
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
                                        <p class="btn btn-info" style="width:100%">#{{ $item->id }}</p>
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary">Thông tin khách hàng
                                                </h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    Tên khách hàng : <b>{{ $item->name }}</b>
                                                </div>
                                                <div class="mb-3">
                                                    Số điện thoại : <b>{{ $item->number_phone }} </b>
                                                </div>
                                                <div class="mb-3">
                                                    Chi nhánh : <b>{{ $item->salon->address }}</b>
                                                </div>
                                                <div class="mb-3">
                                                    Thời gian : <b>{{ $item->time->time_start }}</b>
                                                </div>
                                                <div>
                                                    Ngày : <b>{{ $item->date_booking }}</b>
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
                                                @foreach ($item->service as $key => $ser)
                                                    <div class="row">
                                                        <div class="col-10 mb-3"><b>{{ $ser->name }}</b>
                                                        </div>
                                                        <div>
                                                            <b>{{ number_format($ser->price) }}đ</b>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                        <div class="card-header" style="width:50%;float:right;">
                                            <div class="row mt-2">
                                                <div class="col-8 ">
                                                    <h6 class="m-0 font-weight-bold text-primary">Tổng tiền :
                                                    </h6>
                                                </div>
                                                <div>
                                                    <b>{{ number_format($item->total_price) }}đ</b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal hủy đơn -->
                        <div class="modal fade" id="{{ 'cancel_' . $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc muốn hủy đơn
                                            này?</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <textarea class="form-control" name="" id="{{ $item->id }}_reason" cols="30"
                                            rows="5" placeholder="Mời bạn nhập lý do hủy đơn !"></textarea>
                                        <span class="text-danger" id="{{ $item->id }}_errorReason"></span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                        <button type="submit" onclick="cancellation({{ $item->id }})"
                                            class="btn btn-danger">Hủy đơn</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        function cancellation(id) {
            let reason = $('#' + id + '_reason').val();
            if (reason == "") {
                $('#' + id + '_errorReason').html('Lý do không được để trống');
                return false;
            }
            $.ajax({
                type: "post",
                url: "{{ route('cancellation') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    reason: reason
                },
                success: function(data) {
                    if (data == "") {
                        setTimeout(function() {
                            window.location.href = "{{ route('client.list') }}";
                        }, 100);
                    }
                }
            });
        }
    </script>
@endsection
