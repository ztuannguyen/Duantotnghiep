@extends('layouts.master')
@section('title')
    Chi tiết dịch vụ
@endsection
@section('contents')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('/frontend/images/bg-1.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h2 class="mb-0 bread">Chi tiết</h2>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{route('client.home')}}">Trang chủ <i
                                    class="ion-ios-arrow-round-forward"></i></a></span> <span class="mr-2"><a
                                href="dich_vu.html">Dịch vụ <i class="ion-ios-arrow-forward"></i></a></span> <span>Chi tiết
                            <i class="ion-ios-arrow-round-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ftco-animate" style="text-align: justify;">
                    @foreach ($detail as $item)
                    <h1 class="mb-3">{{$item->name}}</h1>
                    @endforeach
                    <p>{!! collect($detail)->first()->detail !!}</p>
                </div>
            </div>
            <div class="mt-3" style="text-align: center;">
                <a href="{{route('client.show')}}"><img src="/frontend/images/button-booking.png" alt="" width="200"></a>
            </div>
        </div> 
    </section>
@endsection
