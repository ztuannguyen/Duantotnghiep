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
                        <input class="form-control" type="tel" name="number_phone" value="{{ old('number_phone') }}"
                            placeholder="Nhập số điện thoại">
                        @error('number_phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Chi nhánh Salon</label>
                        <select class=" form-control" name="salon_id">
                            @foreach ($ListSalon as $item)
                                <option value="{{ $item->id }}">{{ $item->address }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Dịch vụ</label>
                        <select class="form-control mt-3 " id="js-example-basic-single" name="service_id[]" multiple
                            data-select2-id="js-example-basic-single" tabindex="-1" aria-hidden="true">
                                @foreach ($service as $s)
                                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                                @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Thời gian</label>
                        <select class=" form-control" name="time_id">
                            @foreach ($ListTime as $item)
                                <option value="{{ $item->id }}">{{ $item->time_start }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Ngày đặt</label>
                        <input class="form-control" type="text" name="date_booking" value="{{ old('date_booking') }}"
                            placeholder="Chọn ngày cắt ...">
                        @error('date_booking')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Lời nhắn</label>
                        <input class="form-control" type="text" name="note" value="{{ old('note') }}"
                            placeholder="Nhập nội dung ...">
                        @error('note')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Trạng thái</label>
                        <select class=" form-control" name="status">
                            <option value="1">
                                Chờ xếp lịch
                            </option>
                            <option value="2">
                                Đã xếp lịch
                            </option>
                            <option value="3">
                                Đang làm
                            </option>
                            <option value="4">
                                Đã xong
                            </option>
                            <option value="5">
                                Hủy lịch
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
