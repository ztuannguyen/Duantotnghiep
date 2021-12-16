@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('css')
    <style>
        /* Biều dồ bắt đầu CSS */

        .chartdiv {
            width: 1470px;
            height: 600px;
            border: 1px solid #ccc;
            margin: 10px auto;
        }

        .chartdiv1 {
            float: left;
        }

        .chartgap {
            margin: 0 auto;
        }


        /* Biều dồ kết thúc CSS */


        /* Biều dồ bắt đầu CSS */

        .chartdiv1 {
            width: 900px;
            height: 600px;
            border: 1px solid #ccc;
            margin: 10px auto;
        }

        .chartdiv2 {
            float: left;
        }

        .chartgap1 {
            width: 1px;
            margin: 10px auto;
        }


        /* Biều dồ kết thúc CSS */

    </style>
@endsection
@section('contents')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thống Kê</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <?php
        // Dịch vụ
        $all_don = DB::table('bookings')
            ->get()
            ->count(); // tất cả các đơn hàng dịch vụ
        $don_wait = DB::table('bookings')
            ->where('status', 1)
            ->get()
            ->count();
        $don_da_len = DB::table('bookings')
            ->where('status', 2)
            ->get()
            ->count();
        $don_lam_xong = DB::table('bookings')
            ->where('status', 4)
            ->get()
            ->count();
        $don_huy_lich = DB::table('bookings')
            ->where('status', 5)
            ->get()
            ->count();
        ?>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Đơn dịch vụ</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $all_don }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Đơn chờ xếp lịch</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $don_wait }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-paper-plane fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Đơn đã lên lịch
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $don_da_len }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Đơn đã làm xong</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $don_lam_xong }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Đơn đã hủy</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $don_huy_lich }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-times fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <?php
                use Carbon\Carbon;
                $day_7 = Carbon::today()->subDays(6);
                $day_30 = Carbon::today()->subDays(30);
                $toDay = Carbon::today();
                // Lấy dữ liệu đơn làm xong dịch vụ 7 ngày trước đến nay
                $tong_dv_7 = DB::table('bookings')
                    ->orderBy('id', 'desc')
                    ->where('date_booking', '>=', $day_7)
                    ->where('status', 4)
                    ->select('total_price')
                    ->sum('total_price');
                // Lấy dữ liệu đơn làm xong dịch vụ 30 ngày
                $tong_dv_30 = DB::table('bookings')
                    ->orderBy('id', 'desc')
                    ->where('date_booking', '>=', $day_30)
                    ->where('status', 4)
                    ->sum('total_price');
                // Lấy dữ liệu đơn làm xong hôm nay
                $tong_dv_today = DB::table('bookings')
                    ->orderBy('id', 'desc')
                    ->where('date_booking', '>=', $toDay)
                    ->where('status', 4)
                    ->select('total_price')
                    ->sum('total_price');
                ?>
                <div id="chartdiv1" class="chartdiv"></div>
                <div class="chartgap"></div>
            </div>
        </div>

        
    </div>


    </div>
    <!-- /.container-fluid -->
@endsection
@section('js')
    <script src="https://cdn.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://cdn.amcharts.com/lib/3/serial.js"></script>
    <script src="https://cdn.amcharts.com/lib/3/themes/light.js"></script>
    <script src="https://cdn.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
    <script src="https://cdn.amcharts.com/lib/3/maps/js/worldLow.js"></script>

    <script>
        /**
         * Lazy-init code (relies on jQuery)
         */

        // save the real makeChart function for later
        AmCharts.lazyLoadMakeChart = AmCharts.makeChart;

        // override makeChart function
        AmCharts.makeChart = function(a, b, c) {

            // set scroll events
            jQuery(window).on('load', handleScroll);

            function handleScroll() {
                var $ = jQuery;
                if (true === b.lazyLoaded)
                    return;
                var hT = $('#' + a).offset().top,
                    hH = $('#' + a).outerHeight() / 2,
                    wH = $(window).height(),
                    wS = $(window).scrollTop();
                if (wS > (hT + hH - wH)) {
                    b.lazyLoaded = true;
                    AmCharts.lazyLoadMakeChart(a, b, c);
                    return;
                }
            }

            // Return fake listener to avoid errors
            return {
                addListener: function() {}
            };
        };

        /**
         * First chart
         */
        var chart = AmCharts.makeChart("chartdiv1", {
            "type": "serial",
            "theme": "light",
            "dataProvider": [{
                "country": "Hôm Nay",
                "visits": {!! $tong_dv_today !!},
                "color": "#00a8ff"
            }, {
                "country": "7 Ngày",
                "visits": {!! $tong_dv_7 !!},
                "color": "#fbc531"
            }, {
                "country": "30 Ngày",
                "visits": {!! $tong_dv_30 !!},
                "color": "#9c88ff"
            }],
            "startDuration": 1,
            "graphs": [{
                "fillColorsField": "color",
                "fillAlphas": 0.9,
                "lineAlpha": 0.2,
                "type": "column",
                "valueField": "visits"
            }],
            "categoryField": "country",
            "categoryAxis": {
                "labelsEnabled": true
            },
            "titles": [{
                "text": "Thống kê doanh thu dịch vụ"
            }, {
                "text": "*Đơn vị tính: VNĐ",
                "bold": false
            }]
        });
    </script>
@endsection
