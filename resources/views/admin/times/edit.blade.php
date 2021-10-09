@extends('layouts.admin')
@section('title')
    Sửa thông tin thời gian
@endsection
@section('contents')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Danh sách thời gian</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.times.index') }}">Thời gian đặt lịch</a> </li>
            <li class="breadcrumb-item">Sửa thông tin thời gian</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm mới thời gian</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{ route('admin.times.update',['time' =>$time->id]) }}">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold">Chi nhánh Salon</label>
                        <select class="mt-3 form-control" name="salon_id">
                            @foreach ($ListSalon as $item)
                                <option value="{{$item->id}}">{{$item->address}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Số ghế</label>
                        <input class="form-control" type="text" name="slot" value="{{ $time->slot}}">
                        @error('slot')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Thời gian bắt đầu</label>
                        <input class="form-control" type="time" name="time_start" value="{{ $time->time_start }}">
                        @error('time_start')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Thời gian kết thúc</label>
                        <input class="form-control" type="time" name="time_end" value="{{ $time->time_end }}">
                        @error('time_end')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Sửa</button>
                </form>

            </div>
        </div>
    </div>
@endsection
