@extends('layouts.admin')
@section('title')
    Thêm mới đơn đặt lịch
@endsection
@section('contents')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Đặt lịch</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.bookings.index') }}">Danh sách đặt lịch</a> </li>
            <li class="breadcrumb-item">Thêm mới đơn đặt lịch</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm mới đơn đặt lịch</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{ route('admin.bookings.store') }}">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold">Số điện thoại</label>
                        <input class="form-control" type="tel" name="number_phone" value="{{ old('number_phone') }}" placeholder="Nhập số điện thoại">
                        @error('number_phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Chi nhánh Salon</label>
                        <select class="mt-3 form-control" name="salon_id">
                            @foreach ($ListSalon as $item)
                                <option value="{{ $item->id }}">{{ $item->address }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Dịch vụ</label>
                        @foreach ($cateService as $item)
                            <h6>{{ $item->name_cate }}</h6>
                            <div class="form-check-inline-block mb-3" id="cate_{{ $item['id'] }}">
                                @foreach ($item['services'] as $ser)
                                    <div class="form-check-inline ">
                                        <input class="form-check-input" name="bookings_services[]" type="checkbox"
                                            value="{{ $ser['id'] }}">
                                        <label class="form-check-label" >
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
                                <option value="{{ $item->id }}">{{ $item->time_start }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Ngày đặt</label>
                        <input class="form-control" type="date" name="date_booking" value="{{ old('date_booking') }}">
                        @error('date_booking')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Lời nhắn</label>
                        <input class="form-control" type="text" name="note" value="{{ old('note') }}" placeholder="Nhập nội dung ...">
                        @error('note')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Trạng thái</label>
                        <select class="mt-3 form-control" name="status">
                            <option value="{{ config('common.booking.status.cho_xac_nhan') }}"
                                {{ old('status'), config('common.booking.status.cho_xac_nhan') == config('common.booking.status.cho_xac_nhan') ? 'selected' : '' }}>
                                Chờ xác nhận
                            </option>
                            <option value=" {{ config('common.booking.status.da_xac_nhan') }}"
                                {{ old('status'), config('common.booking.status.da_xac_nhan') == config('common.booking.status.da_xac_nhan') ? 'selected' : '' }}>
                                Đã xác nhận
                            </option>
                            <option value=" {{ config('common.booking.status.da_huy') }}"
                                {{ old('status'), config('common.booking.status.da_huy') == config('common.booking.status.da_huy') ? 'selected' : '' }}>
                                Đã Hủy
                            </option>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Thêm</button>
                </form>

            </div>
        </div>
    </div>
@endsection
{{-- @section('script')
    <script>
            $("input:checkbox").on('click', function() {
    // in the handler, 'this' refers to the box clicked on
    var $box = $(this);
    if ($box.is(":checked")) {
        // the name of the box is retrieved using the .attr() method
        // as it is assumed and expected to be immutable
        var group = "input:checkbox[name='" + $box.attr("name") + "']";
        // the checked state of the group/box on the other hand will change
        // and the current value is retrieved using .prop() method
        $(group).prop("checked", false);
        $box.prop("checked", true);
    } else {
        $box.prop("checked", false);
    }
    });
    </script>
@endsection --}}
