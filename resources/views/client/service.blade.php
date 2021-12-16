@extends('layouts.master')
@section('title')
    Dịch vụ
@endsection
@section('css')
    <style>
        .bner_vip-section {
            position: relative;
            height: 600px;
        }

        .bner_vip-section .service__title {
            padding: 5px 0 5px 45px;
            font-size: 25px;
            text-transform: uppercase;
            font-weight: 600;
            color: black;
        }

        .bner_vip-section .service__title:before {
            content: "";
            position: absolute;
            width: 8px;
            height: 6%;
            background: #fc3;
            left: 0;
            top: 53px;
            transform: translateY(-50%);
            margin-left: 28px;
        }
        .card-img-top{
            transform: scale(1.1);
            transition: all .2s ease-in-out;
        }
    </style>
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
    <section class="ftco-section ftco-team">
        <div class="container-fluid px-md-5">
            <div class="row justify-content-center pb-3">
                <div class="col-md-10 heading-section text-center ftco-animate">
                    <span class="subheading">Brotherhoods</span>
                    <h2 class="mb-4">Trải nghiệm dịch vụ</h2>
                    <p>Hãy cùng tận hưởng các dịch vụ chăm sóc tóc đặc biệt tại Brotherhoods</p>
                </div>
            </div>

        </div>
    </section>
    @foreach ($category as $item)
        <section class="bner_vip-section ftco-booking bg-light" style="height: auto;">
            <div class="container-fluid px-md-5">
                <div class="service__title" style="padding-bottom: 20px; padding-top: 30px;">{{$item['name_cate']}}</div>
                <div class="container-fluid">
                    <div class="service__list">
                        <div class="swiper-container bbb_viewed_slider_container row col-md-12">
                            <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                                <div class="owl-carousel bbb_viewed_slider"   id="cate_{{ $item['id'] }}">
                                    @foreach ($item['services'] as $service)
                                    <div class="card mb-3" style="width: 23rem;height: 26rem;" >
                                        <img class="card-i mg-top" src="{{ url('uploads') }}/{{ $service['image'] }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$service['name']}}</h5>
                                            <p class="card-subtitle">{{$service['description']}}.</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col"> <p class="card-text">{{number_format($service['price'])}}đ</p></div>
                                               <div class="col"> <a href="{{route('client.detailService',['id' => $service->id])}}" class="card-text">Xem chi tiết >>></a></div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endsection
