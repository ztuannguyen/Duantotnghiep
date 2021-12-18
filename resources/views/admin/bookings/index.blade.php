<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
            <div class="row">

                <div class="col-2 mt-4">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a href="/admin/bookings/create" class="btn btn-success">

                        <span class="text">Thêm mới</span>
                    </a>
                </div>
                <div class="col-3"></div>
                <div class="col-7 mt-2">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-3">
                                <label for="">Chi nhánh</label>
                                <select class="form-control" name="salon_id" id="">
                                    <option @if (isset($searchData['salon_id']) && $searchData['salon_id'] == '') selected @endif value="">Chọn chi nhánh ..</option>
                                    <option @if (isset($searchData['salon_id']) && $searchData['salon_id'] == 1) selected @endif value="1">151 Cầu Giấy, P. Quan Hoa, Q. Cầu Giấy, Hà
                                        Nội
                                    </option>
                                    <option @if (isset($searchData['salon_id']) && $searchData['salon_id'] == 2) selected @endif value="2">109 Trần Quốc Hoàn, P. Dịch Vọng Hậu, Q. Cầu
                                        Giấy, Hà Nội</option>
                                    <option @if (isset($searchData['salon_id']) && $searchData['salon_id'] == 3) selected @endif value="3">382 Nguyễn Trãi, P. Thanh Xuân Trung, Q.
                                        Thanh
                                        Xuân, Hà Nội</option>
                                    <option @if (isset($searchData['salon_id']) && $searchData['salon_id'] == 4) selected @endif value="4">235 Đội Cấn, P. Liễu Giai, Q. Ba Đình, Hà Nội
                                    </option>
                                    <option @if (isset($searchData['salon_id']) && $searchData['salon_id'] == 5) selected @endif value="4">346 Khâm Thiên, P. Thổ Quan, Q. Đống Đa, Hà
                                        Nội
                                    </option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="">Thời gian</label>
                                <input type="text" class="form-control date_start" name="date_booking" id="date_start"
                                    @if (isset($searchData['date_booking'])) value="{{ $searchData['date_booking'] }}" @endif placeholder="Chọn ngày" autocomplete="off">
                            </div>
                            <div class="col-3">
                                <label for="">Trạng thái</label>
                                <select class="form-control filter_status" name="status" id="">
                                    <option @if (isset($searchData['status']) && $searchData['status'] == '') selected @endif value="">Chọn trạng thái ..</option>
                                    <option @if (isset($searchData['status']) && $searchData['status'] == 1) selected @endif value="1">Chờ xếp lịch</option>
                                    <option @if (isset($searchData['status']) && $searchData['status'] == 2) selected @endif value="2">Đã xếp lịch</option>
                                    <option @if (isset($searchData['status']) && $searchData['status'] == 3) selected @endif value="3">Đã xong</option>
                                    <option @if (isset($searchData['status']) && $searchData['status'] == 4) selected @endif value="4">Hủy lịch</option>
                                </select>
                            </div>
                            <div class="col-3 mt-4">
                                <button type="submit" class="btn btn-primary btn-icon-split">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
                            <td>Tên khách hàng</td>
                            <td>Số điện thoại</td>
                            <td>Chi nhánh</td>
                            <td>Chi tiết</td>
                            <td>Trạng thái</td>
                            <td>Hành động</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>#{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->number_phone }}</td>
                                <td>{{ $item->Salon->address }}</td>
                                <td><a class="btn btn-primary btn-sm " data-toggle="modal"
                                        data-target="{{ '#' . '_' . $item->id }}">Xem</a></td>
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
                                    
                                    <a href="{{route('admin.bookings.invoices', ['id' => $item->id])}}"  class="btn btn-primary btn-circle btn-sm"><i class="fas fa-download"></i></a>
                                    {{-- cancel --}}
                                    <a data-toggle="modal" data-target="#cancel_{{ $item->id }}"
                                     class="btn btn-warning btn-circle btn-sm">🚫</a>
                                    <div class="modal fade" id="cancel_{{ $item->id }}" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hủy đơn đặt lịch</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="{{route('admin.cancelBooking')}}">
                                                    @csrf
                                                 <div class="modal-body">
                                                    <input type="text" style="width:50px;" hidden value="{{$item->id}}" name="booking_id">
        
                                                    <select class="form-select" aria-label="Default select example" name="reason">
                                                       <option value="">Vui lòng nhập lí do ?</option>
                                                       <option value="Có việc bận hoặc không muốn cắt nữa">Có việc bận hoặc không muốn cắt nữa</option>
                                                       <option value="Muốn thay đổi lịch">Muốn thay đổi lịch </option>
                                                       <option value="Khác">Khác</option>
                                                     </select>
                                                     @error('reason')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                                                </div> 
                                                
                                                <div class="modal-footer">
                                                    
                                                     
                                                         
                                                           <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Hủy lịch</button>
                                                    
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- xóa --}}
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
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    @else
        <h2>Không có dữ liệu</h2>
    @endif
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
@endsection
@section('script')
<script>
    $('#date_start').datepicker({
        todayHighlight: !0,
        autoclose: !0,
        format: "yyyy-mm-dd"
    })
</script>
@endsection
