@extends('layouts.admin')
@section('title')
    Danh sách đặt lịch
@endsection
@section('contents')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Đặt lịch</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.bookings.index') }}"> Danh sách đặt lịch</a> </li>
        </ol>
    </nav>
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <a href="/admin/bookings/create" class="btn btn-success  ">

                <span class="text">Thêm mới</span>
            </a>
        </div>
    @section('search-form')
        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto  ml-md-3 my-2 my-md-0 mw-100 navbar-search"
            action="{{ route('admin.bookings.index') }}" method="GET">
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
                            <td>Mã hóa đơn</td>
                            <td>Số điện thoại</td>
                            <td>Chi nhánh</td>
                            <td>Thời gian</td>
                            <td>Ngày đặt</td>
                            <td>Chi tiết</td>
                            <td>Trạng thái</td>
                            <td>Hành động</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>#{{$item->id}}</td>
                                <td>{{ $item->number_phone }}</td>
                                <td>{{ $item->Salon->address }}</td>
                                <td>{{ $item->Time->time_start}}</td>
                                <td>{{ $item->date_booking }}</td>
                                <td><a class="btn btn-primary btn-sm btn-xem-chi-tiet"
                                        data-appointmentid="{{ $item->id }}" target="_blank">Xem</a></td>
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
                                <td>
                                    <a href="{{ route('admin.bookings.edit', ['id' => $item->id]) }}"
                                        class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
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
                                                        action="{{ route('admin.bookings.remove', ['booking' => $item->id]) }}">
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
        <!-- Modal chi tiết-->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #14a08d;color:white">
                        <h5 class="modal-title" id="staticBackdropLabel">Chi tiết đơn đặt lịch</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số điện thoại</label>
                            <input type="text" class="form-control" id="modal_phone">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Chi nhánh</label>
                            <input type="text" class="form-control" id="modal_salon">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thời gian </label>
                            <input type="text" class="form-control" id="modal_time_start">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ngày đặt</label>
                            <input type="text" class="form-control" id="modal_date_booking">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Lời nhắn</label>
                            <textarea class="form-control" name="note" id="modal_note" rows="5"></textarea>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tên dịch vụ </th>
                                    <th scope="col">Giá</th>
                                </tr>
                            </thead>
                            <tbody id="modal_tbody">
                            </tbody>
                            <thead>
                                <tr>
                                    <th scope="col"> </th>
                                    <th scope="col"></th>
                                </tr>

                                <tr>
                                    <th scope="col">Tạm tính </th>
                                    <th scope="col" class="tam_tinh"></th>
                                </tr>

                                <tr>
                                    <th scope="col">Mã giảm giá</th>
                                    <th scope="col" class="ma_giam_gia"></th>
                                </tr>
                                <tr>
                                    <th scope="col">Tổng tiền </th>
                                    <th scope="col" class="modal_total_monney_detail"></th>
                                </tr>
                            </thead>
                        </table>
                        <p class="modal_created_at"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    @else
        <h2>Không có dữ liệu</h2>
    @endif
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('.btn-xem-chi-tiet').on('click', function() {
            $('#staticBackdrop').modal('show')
            let id = $(this).data('appointmentid');
            let apiDetail = '{{ route('admin.bookings.detailAppointment') }}';
            $.ajax({
                url: apiDetail,
                method: "POST",
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(response) {
                    if (response.data) {
                        $("#modal_phone").val(response.data.number_phone);
                        $("#modal_salon").val(response.data.salon_id)
                        $("#modal_time_start").val(response.data.time_id);
                        $("#modal_date_booking").val(response.data.date_booking);
                        $("#modal_note").val(response.data.note);

                        let output = "";
                        let total = "";
                        for (let i = 0; i < response.service.length; i++) {
                            var obj = response.service[i];
                            var price = new Intl.NumberFormat().format(obj.discount);
                            output += `<tr>
                                           <th scope="row"> ` + obj.name + `</th>
                                           <td> ` + price + ` VNĐ</td>
                                           </tr>`;
                        }

                        $("#modal_tbody").html(output);
                        $(".tam_tinh").html(new Intl.NumberFormat().format(response.data
                            .total_price) + ' VNĐ');
                        $(".thue_vat").html(new Intl.NumberFormat().format((response.data
                            .total_price * 10) / 100) + ' VNĐ');
                        $(".ma_giam_gia").html(new Intl.NumberFormat().format(response.data
                            .discount_price) + ' VNĐ');
                        $(".modal_total_monney_detail").html(new Intl.NumberFormat().format(
                            (response.data.total_price) + (response.data
                                .discount_price)) + ' VNĐ');
                    } else {
                        swal("Đơn đặt hàng không tồn tại", "", "warning");
                    }
                }
            })

        })

    })
</script>
@endsection
