@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('css')
    <style>
        /* Biều dồ bắt đầu CSS */

        .chartdiv {
            width: 900px;
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
            ->where('status', 3)
            ->get()
            ->count();
        $don_huy_lich = DB::table('bookings')
            ->where('status', 4)
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
        <div class="col-xl-8 col-lg-7">
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
                    ->where('status', 3)
                    ->select('total_price')
                    ->sum('total_price');
                // Lấy dữ liệu đơn làm xong dịch vụ 30 ngày
                $tong_dv_30 = DB::table('bookings')
                    ->orderBy('id', 'desc')
                    ->where('date_booking', '>=', $day_30)
                    ->where('status', 3)
                    ->sum('total_price');
                // Lấy dữ liệu đơn làm xong hôm nay
                $tong_dv_today = DB::table('bookings')
                    ->orderBy('id', 'desc')
                    ->where('date_booking', '>=', $toDay)
                    ->where('status', 3)
                    ->select('total_price')
                    ->sum('total_price');
                ?>
                <div id="chartdiv1" class="chartdiv"></div>
                <div class="chartgap"></div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Direct
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Social
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Referral
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>

            <!-- Color System -->
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card bg-primary text-white shadow">
                        <div class="card-body">
                            Primary
                            <div class="text-white-50 small">#4e73df</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-success text-white shadow">
                        <div class="card-body">
                            Success
                            <div class="text-white-50 small">#1cc88a</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-info text-white shadow">
                        <div class="card-body">
                            Info
                            <div class="text-white-50 small">#36b9cc</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-warning text-white shadow">
                        <div class="card-body">
                            Warning
                            <div class="text-white-50 small">#f6c23e</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-danger text-white shadow">
                        <div class="card-body">
                            Danger
                            <div class="text-white-50 small">#e74a3b</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-secondary text-white shadow">
                        <div class="card-body">
                            Secondary
                            <div class="text-white-50 small">#858796</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-light text-black shadow">
                        <div class="card-body">
                            Light
                            <div class="text-black-50 small">#f8f9fc</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-dark text-white shadow">
                        <div class="card-body">
                            Dark
                            <div class="text-white-50 small">#5a5c69</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="img/undraw_posting_photo.svg" alt="...">
                    </div>
                    <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow"
                            href="https://undraw.co/">unDraw</a>, a
                        constantly updated collection of beautiful svg images that you can use
                        completely free and without attribution!</p>
                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on
                        unDraw &rarr;</a>
                </div>
            </div>

            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                </div>
                <div class="card-body">
                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                        CSS bloat and poor page performance. Custom CSS classes are used to create
                        custom components and custom utility classes.</p>
                    <p class="mb-0">Before working with this theme, you should become familiar with the
                        Bootstrap framework, especially the utility classes.</p>
                </div>
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
