@extends('layouts.admin')
@section('title')
    Sửa thông tin đơn đặt lịch
@endsection
@section('contents')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Đặt lịch</li>
        <li class="breadcrumb-item"><a href="{{ route('admin.bookings.index') }}">Danh sách đơn đặt lịch</a> </li>
        <li class="breadcrumb-item">Sửa thông tin đơn đặt lịch</li>
    </ol>
</nav>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sửa thông tin đơn đặt lịch</h6>
    </div>
    <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{ route('admin.bookings.update',['booking' => $booking]) }}">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold">Số điện thoại</label>
                        <input class="form-control" type="tel" name="number_phone" value="{{ $booking->number_phone }}">
                        @error('number_phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Chi nhánh Salon</label>
                        <select class="mt-3 form-control" name="salon_id">
                            @foreach ($ListSalon as $item)
                                <option {{ ($item->id == $booking->salon_id) ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->address }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Dịch vụ</label>
                        @foreach ($cateService as $item)
                            <h6>{{ $item->name_cate }}</h6>
                            <div class="form-check-inline-block mb-3"  name="bookings_services[]" >
                                @foreach ($item['services'] as $ser)
                                    <div class="form-check-inline" >
                                        <input class="form-check-input" type="checkbox"  {{ ($ser['id'] == $booking['bookings_services']) ? 'selected' : '' }}
                                            value="{{ $ser['id'] }}">
                                        <label class="form-check-label">
                                            {{ $ser['name'] }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach

                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Thời gian</label>
                        <select class="mt-3 form-control" name="time_id">
                            @foreach ($ListTime as $item)
                                <option {{ ($item->id == $booking->time_id) ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->time_start }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Ngày đặt</label>
                        <input class="form-control" type="date" name="date_booking" value="{{ $booking->date_booking }}">
                        @error('date_booking')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Lời nhắn</label>
                        <input class="form-control" type="text" name="note" value="{{$booking->note }}">
                        @error('note')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Trạng thái</label>
                        <select class="mt-3 form-control" name="status">
                            <option value="1" {{ $booking->status == 1 ? 'selected' : '' }} >
                                Chờ xác nhận
                            </option>
                            <option value="2" {{ $booking->status == 2 ? 'selected' : '' }}>
                                Đã xác nhận
                            </option>
                            <option value="3" {{ $booking->status == 3 ? 'selected' : '' }}>
                                Đã Hủy
                            </option>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Sửa</button>
                </form>

            </div>
        </div>
</div>
@endsection