@extends('layouts.master')
@section('title')
    Đăng nhập
@endsection
@section('contents')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('frontend/images/bg-1.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end
          justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h2 class="mb-0 bread">Đăng nhập</h2>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang
                                chủ <i class="ion-ios-arrow-round-forward"></i></a></span>
                        <span>Đăng nhập</span>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="row justify-content-center">
                    <div class="col-md-10 ftco-animate">
                        <form action="{{ route('client.postLogin') }}" method="POST" id="form-login">

                            @csrf
                            
                            @include('client.includes.auth.step1')
                            @include('client.includes.auth.step2')
                            @include('client.includes.auth.step3')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
