@extends('layouts.master')
@section('title')
    Trang Chủ
@endsection
@section('contents')
    <!-- TEST-->
    <section class="hero-wrap js-fullheight" data-stellar-background-ratio="0.5">
        <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item  active" style="background-image: url('frontend/images/bg-2.jpg');">
                    <div class="container">
                        <div class="row no-gutters slider-text js-fullheight justify-content-center align-items-center">
                            <div class="col-lg-12 ftco-animate d-flex align-items-center">
                                <div class="text text-center">
                                    <h1 class="mb-4" style="text-shadow: 5px 2px 4px #bf925b;">Chào mừng đến với
                                        Brotherhoods</h1>
                                    @if (Auth::check())
                                        @can('customer')
                                            <a href="{{ route('client.show') }}" class="btn btn-primary px-5 py-3">
                                                <h4 class="text-white">Đặt lịch ngay</h4>
                                            </a>
                                        @endcan
                                    @else
                                        <a href="{{ route('client.login') }}" class="btn btn-primary px-5 py-3">
                                            <h4 class="text-white">Đặt lịch ngay</h4>
                                        </a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('frontend/images/bg-1.jpg');">

                    <div class="container">
                        <div class="row no-gutters slider-text js-fullheight justify-content-center align-items-center">
                            <div class="col-lg-12 ftco-animate d-flex align-items-center">
                                <div class="text text-center">
                                    <h1 class="mb-4" style="text-shadow: 5px 2px 4px #bf925b;">Hãy tận hưởng sự
                                        tỏa sáng cùng Brotherhoods</h1>
                                    <a href="{{ route('client.show') }}" class="btn btn-primary px-5 py-3">
                                        <h4 class="text-white">Đặt lịch ngay</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </section>
    <!-- TEST-->


    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container-fluid px-0">
            <div class="row no-gutters">
                <div class="col-md text-center d-flex align-items-stretch">
                    <div class="services-wrap d-flex align-items-center img"
                        style="background-image: url(/frontend/images/formen.jpg);">
                        <div class="text">
                            <h3>HOODS DỊCH VỤ</h3>
                            <p><a href="{{ route('client.service') }}" class="btn-custom">Xem thêm <span
                                        class="ion-ios-arrow-round-forward"></span></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-items-stretch">
                    <div class="text-about py-5 px-4 mb-2">
                        <?php
                        $logo = DB::table('logos')
                            ->where('status', 0)
                            ->get();
                        ?>
                        @foreach ($logo as $item)
                            <a class="logo" href="index.html"><img src="{{ asset('uploads/' . $item->image) }}"
                                    width="200" height="60"></a>
                        @endforeach
                        <h2 class="mt-3">Chào mừng đến với Salon của chúng tôi</h2>
                        <p>Sứ mệnh của Brotherhoods là giúp nam giới Việt Nam có được vẻ ngoài đẹp trai, tinh thần sảng
                            khoái thu hút phái đẹp. Với kinh nghiệm phục vụ hàng triệu nam giới Việt thông qua việc
                            chuyên cung cấp các dịch vụ chăm sóc tóc, da mặt,…của chuỗi cắt tóc nam Brotherhoods.</p>
                        <p class="mt-3"><a href="{{ route('client.about') }}"
                                class="btn btn-primary btn-outline-primary">Đọc thêm</a></p>
                    </div>
                </div>
                <div class="col-md text-center d-flex align-items-stretch">
                    <div class="services-wrap d-flex align-items-center img"
                        style="background-image: url(/frontend/images/work-2.jpg);">
                        <div class="text">
                            <h3>HOODS TỎA SÁNG</h3>
                            <p><a href="{{ route('client.service') }}" class="btn-custom">Xem thêm <span
                                        class="ion-ios-arrow-round-forward"></span></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-team">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="heading-section text-center ftco-animate">
                    <h2 class="mb-4">dịch vụ nổi bật</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="carousel-team owl-carousel">
                        @foreach ($listservice as $item)
                            <div class="item team">
                                <a href="#" class="text-center ">
                                    <img src="{{ asset('uploads/' . $item->image) }}" alt="">
                                    <h2 class="mt-2">{{ $item->name }}</h2>
                                </a>
                                <div class="row mt-3" style="padding-left: 50px">
                                    <div class="col"><span
                                            class="card-text">{{ number_format($item->price) }}đ</span></div>
                                    <div class="col"><a
                                            href="{{ route('client.detailService', ['id' => $item->id]) }}"
                                            class="card-text">Xem chi tiết >></a></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="services-section ftco-section">
        <div class="container-fluid">
            <div class="row justify-content-center pb-3">
                <div class="col-md-10 heading-section text-center ftco-animate">
                    <h2 class="">cam kết của brother hoods</h2>
                    <span class="subheading">Sự hài lòng của anh là ưu tiên hàng đầu của Brother Hoods</span>
                </div>
            </div>
            <img style="width: 100%;" src="/frontend/images/bg-4.jpg" alt="">
            <div class="row no-gutters d-flex">
                <div class="col-md-6 col-lg-4 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-center">
                        <div class="icon"><img src="/frontend/images/3-care.png" alt=""></div>
                        <div class="media-body">
                            <h3 class="heading">15 ngày</h3>
                            <p>Mái tóc sau khi uốn nhuộm có thể không đúng ý anh sau khi về nhà. Brother Hoods sẽ hỗ trợ
                                anh
                                chỉnh sửa hoàn toàn miễn phí trong vòng 15 ngày. Anh đặt lịch bình thường và chọn dịch
                                vụ bảo hành hoặc báo lễ tân.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-center">
                        <div class="icon"><img src="/frontend/images/2-care.png" alt=""></div>
                        <div class="media-body">
                            <h3 class="heading">7 ngày</h3>
                            <p>Nếu anh chưa hài lòng về kiểu tóc sau khi về nhà vì bất kỳ lý do gì, Brother Hoods sẽ hỗ
                                trợ
                                anh sửa lại mái tóc đó hoàn toàn miễn phí trong vòng 7 ngày. Anh đặt lịch bình thường và
                                báo sửa tóc với lễ tân.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block text-center">
                        <div class="icon"><img src="/frontend/images/4-care.png" alt=""></div>
                        <div class="media-body">
                            <h3 class="heading">Giảm 20%</h3>
                            <p>Brother Hoods cam kết phục vụ anh đúng giờ đặt lịch. Nếu anh phải chờ lâu hơn 20 phút so
                                với
                                giờ đặt lịch, Brother Hoods sẽ giảm giá ngay 20% cho hoá đơn Hoods Combo</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-team">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="heading-section text-center ftco-animate">
                    <h2 class="mb-4">Bài Viết</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="carousel-team owl-carousel">
                        @foreach ($listBlog as $item)
                            <div class="item team">
                                <a href="{{ route('client.detailBlog', ['id' => $item->id]) }}" class="text-center">
                                    <img src="{{ asset('uploads/' . $item->image) }}" alt="">
                                    <h2>{{ $item->title }}</h2>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
