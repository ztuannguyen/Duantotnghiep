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
                <form method="POST" action="{{ route('admin.bookings.update',['id' => $booking->id]) }}">
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
                        <label for="" class="font-weight-bold">Dịch vụ</label>
                        <select class="form-control " id="js-example-basic-single" 
                        name="service_id[]" multiple data-select2-id="js-example-basic-single" tabindex="-1"
                        aria-hidden="true" 
                        >
                        @foreach ($service as $s)
                            <option value="{{ $s->id }}"
                                @foreach ($booking->service as $bs)
                                        @if ($s->id == $bs->id)
                                            selected
                                        @endif
                                    @endforeach
                                >{{ $s->name }}</option>
                        @endforeach
                    </select>

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
                        <input class="form-control" type="text" name="date_booking" value="{{ $booking->date_booking }}">
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
                        <select  name="status" class="mt-3 form-control">
                            <option value="1" {{$booking->status == 1 ? 'selected':''}} >Chờ xếp lịch</option>
                            <option value="2" {{$booking->status == 2 ? 'selected':''}}>Đã xếp lịch</option>
                            <option value="3" {{$booking->status == 3 ? 'selected':''}}>Đã xong</option>
                            <option value="4" {{$booking->status == 4 ? 'selected':''}}>Hủy lịch</option>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>

                    <button type="submit" name="btn" value="0" class="btn btn-success">Sửa</button>
                </form>

            </div>
        </div>
</div>
@endsection
@section('addScript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $('#js-example-basic-single').select2({
                placeholder: " Chọn dịch vụ ...",
                allowClear: true,
            });
        });
    </script>

@endsection