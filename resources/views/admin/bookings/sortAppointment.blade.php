@extends('layouts.admin')
@section('title')
    Timeline
@endsection
@section('contents')
    <div id="scheduler_here" class="dhx_cal_container d-inline-block" style='width:55%; height:600px;'>
        <div class="dhx_cal_navline">
            <div class="dhx_cal_prev_button">&nbsp;</div>
            <div class="dhx_cal_next_button">&nbsp;</div>
            <div class="dhx_cal_today_button"></div>
            <div class="dhx_cal_date"></div>
        </div>
        <div class="dhx_cal_header">
        </div>
        <div class="dhx_cal_data">
        </div>
    </div>

    <div class="d-inline-block align-top" style="width: 44%;">
        <div class="row">
            <div class="col-4">
                <input type="date" name="" class="form-control">
            </div>
            <div class="col-4">
                <div class="form-group">
                    <select class="form-control" id="salon">
                        @foreach ($salons as $salon)
                            @if ($salon->id == $id_salon)
                                <option value={{ $salon->id }} selected>
                                    {{ $salon->address }}
                                </option>
                            @else
                                <option value={{ $salon->id }}>
                                    {{ $salon->address }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-4">
                <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
            </div>
        </div>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã hóa đơn</th>
                    <th>SĐT</th>
                    <th>Dịch vụ</th>
                    <th>Xếp lịch</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookingServices as $item)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>#{{ $item->booking->id }}</td>
                        <td>{{ $item->booking->number_phone }}</td>
                        <td>
                            {{ $item->service->name }}
                        </td>
                        <td><button class="btn btn-success btn-sm" data-toggle="modal"
                                data-target={{ '#' . '_' . $item->booking->id }}><i
                                    class="fas fa-calendar-week"></i></button>
                        </td>
                        <td>
                            @if ($item->status == 0)
                                <span class="badge badge-danger p-3 ">Chờ xếp lịch </span>
                            @elseif($item->status == 2)
                                <span class="badge badge-danger p-3 ">Chờ xếp lịch </span>
                            @endif
                        </td>
                    </tr>
                    <div class="modal fade" id={{ '_' . $item->booking_id }}>
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Xếp lịch</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="comtainer">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="font-weight-bold">Thông tin đơn lịch :</label>
                                                </div>
                                            </div>

                                            <ul class="mt-3">
                                                @php
                                                    $timeTotal = 0;
                                                @endphp

                                                @php
                                                    $timeTotal += $item->service->execution_time;
                                                @endphp
                                                <li>
                                                    Tên dịch vụ : {{ $item->service->name }}
                                                </li>
                                                <li>Giá : {{ number_format($item->service->discount) }}đ</li>
                                                <li>Thời gian làm : {{ $item->service->execution_time }} phút</li>
                                                <li>Thời gian bắt đầu : {{ $item->booking->time->time_start }}</li>
                                                <li>Ngày : {{ $item->booking->date_booking }}</li>
                                                <li>
                                                    Tổng thời gian: {{ $timeTotal }} phút
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="row">

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="font-weight-bold">Thời gian</label>
                                                    <div class="mt-3">
                                                        <input type="text" class="form-control bs-timepicker"
                                                            id={{ $item->id . 'time' }}>
                                                    </div>
                                                    <p class="error_dateTime"></p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="font-weight-bold">Số ghế</label>
                                                    <select class="mt-3 form-control " name="chair" id="chair_id">
                                                        @foreach ($chairs as $chair)
                                                            <option value={{ $chair['key'] }}>
                                                                {{ $chair['label'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal"
                                            onclick="submit({{ $item->id }},{{ $timeTotal }},{{ $item->booking->salon_id }})">Xếp
                                            lịch</button>
                                    </div>
                                    <input type="hidden" id="status" value="1">
                                </div>
                            </div>
                        </div>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection

@section('css')
    <script src='{{ asset('admin/jsScheduler/dhtmlxscheduler.js?v=5.3.12') }}' type="text/javascript" charset="utf-8">
    </script>
    <script src='{{ asset('admin/jsScheduler/ext/dhtmlxscheduler_timeline.js?v=5.3.12') }}' type="text/javascript"
        charset="utf-8">
    </script>
    <script src='{{ asset('admin/jsScheduler/ext/dhtmlxscheduler_collision.js?v=5.3.12') }}' type="text/javascript"
        charset="utf-8">
    </script>
    <link rel='stylesheet' type='text/css' href='{{ asset('admin/jsScheduler/dhtmlxscheduler_material.css?v=5.3.12') }}'>
    <style type="text/css">
        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        .dhx_timeline_table_wrapper .dhx_cal_event_line {
            height: 100% !important;
        }

    </style>
@endsection
@section('js')
    <script type="text/javascript" charset="utf-8">
        function submit(id, timetotal, salon) {
            let chair_id = $('#chair_id').val();
            let time = $(`#${id}time`).val()
            let timestart = $(`#${id}time`).val()
            let status = $('#status').val();
            let mang = time.split(':')
            let h = Math.floor((Number(mang[1]) + Number(timetotal)) / 60)
            let p = (Number(mang[1]) + Number(timetotal)) % 60
            mang[0] = Number(mang[0]) + h
            mang[1] = p
            time = mang.join(':')
            $('.close_modal');
            $('.error_dateTime').html();
            $.ajax({
                type: "post",
                url: "{{ route('admin.bookings.sortAppointment') }}",
                data: {
                    id: id,
                    chair_id: chair_id,
                    time_start: timestart,
                    time_end: time,
                    status: status,
                    salon_id: salon,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('.error_dateTime').html(data);
                    toastr.success("Xếp lịch thành công !");

                    setTimeout(function() {
                        window.location.href = "{{ route('admin.bookings.sortAppointment') }}";
                    }, 500);

                    
                }
            });
        }
        var chairs = {!! json_encode($chairs) !!};
        var sort_appointments = {!! json_encode($sort_appointments) !!};
        window.addEventListener("DOMContentLoaded", function() {

            scheduler.locale.labels.timeline_tab = "Timeline";
            scheduler.locale.labels.section_custom = "Section";
            scheduler.config.details_on_create = false;
            scheduler.config.details_on_dblclick = false;
            scheduler.config.dblclick_create = false;
            scheduler.config.drag_create = false;
            scheduler.config.collision_limit = 1;

            scheduler.createTimelineView({
                name: "timeline",
                x_unit: "minute",
                x_date: "%H:%i",
                x_step: 30,
                x_size: 24,
                x_start: 17,
                x_length: 48,
                y_unit: chairs,
                y_property: "chair_id",
                render: "bar",
                scrollable: true,
                event_dy: "full",
                column_width: 200,

            });
            scheduler.config.lightbox.sections = [{
                    name: "Ghế",
                    type: "select",
                    options: chairs,
                    map_to: "chair_id"
                },
                {
                    name: "Thời gian",
                    type: "time",
                    map_to: "auto",
                },

            ];
            scheduler.init('scheduler_here', new Date(moment().format('LL')), "timeline");
            scheduler.parse(
                sort_appointments
            );
            scheduler.load("/admin/bookings/booking_services", "json");
            var dp = new dataProcessor("/admin/bookings/booking_services");
            dp.init(scheduler);
            dp.setTransactionMode({
                mode: "REST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                    "Accept-Language": "fr-FR"
                },
                payload: {
                    _token: '{{ csrf_token() }}'
                }
            }, true);

            $('#salon').change(() => {
                var value = $('#salon').val()
                var url = new URL(location.href);
                url.search = "?" + "salon=" + value

                window.location.href = url
            })
        });
        $(document).ready(function() {
            $('.bs-timepicker').timepicker({
                format: 'HH:mm:00',
                showInputs: false,
                showMeridian: false,
                setTime: null
            });

        })
    </script>
@endsection
