@extends('layouts.master')
@section('title')
    Dịch vụ
@endsection
@section('contents')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('frontend/images/bg-1.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h2 class="mb-0 bread">Dịch vụ</h2>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ
                                <i class="ion-ios-arrow-round-forward"></i></a></span> <span>Dịch vụ </span></p>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid mt-3">
        <div class="row justify-content-center">
            <div class="col-md-5 heading-section text-center ftco-animate">
                <span class="subheading">Brotherhoods</span>
                <h2 class="mb-4">Trải Nghiệm Dịch Vụ</h2>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-team ">
        @foreach ($category as $item)
            <section class="bner-section ftco-booking bg-light" style="height: auto;">
                <div class="container-fluid px-md-5" style="margin-top: -100px; margin-bottom: -100px;">
                    <div class="row">
                        <div class="service__title">{{ $item['name_cate'] }}
                        </div>
                    </div>
                    <div class="owl-carousel bbb_viewed_slider" id="cate_{{ $item['id'] }}">
                        @foreach ($item['services'] as $service)
                            <div class="blog-card blog-card-blog">
                                <div class="blog-card-image">
                                    <a href="#"> <img class="img"
                                            src="{{ url('uploads') }}/{{ $service['image'] }}">
                                        <div class="ripple-cont"></div>
                                </div>
                                <div class="blog-table">
                                    <h4 class="blog-card-caption">
                                        <a href="#">{{ $service['name'] }}</a>
                                    </h4>
                                    <p class="blog-card-description">{{ $service['description'] }}</p>
                                    <div class="ftr">
                                        <div class="author">
                                            <span>{{ number_format($service['price']) }}đ</span>
                                        </div>
                                        <div class="stats">
                                            <a href=""><i>Xem chi tiết>>></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </section>
        @endforeach
    </section>

@endsection
