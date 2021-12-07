@extends('layouts.master')
@section('title')
    Chi tiết bài viết
@endsection
@section('contents')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('/frontend/images/bg-1.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h2 class="mb-0 bread">Blog</h2>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="ion-ios-arrow-round-forward"></i></a></span> <span class="mr-2"><a
                                href="{{ route('client.blog') }}">Blog <i class="ion-ios-arrow-forward"></i></a></span>
                        <span>Chi tiết bài viết <i class="ion-ios-arrow-round-forward"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <p>{!! collect($detail)->first()->detail !!}</p>

                    <div class="tag-widget post-tag-container mb-5 mt-5">
                        <div class="tagcloud">
                            <?php
                            $category = DB::table('cate_blogs')
                                ->where('status', 0)
                                ->get();
                            ?>
                            @foreach ($category as $item)
                                <?php
                                $blog = DB::table('blogs')
                                    ->where('cate_id', $item->id)
                                    ->get();
                                ?>
                                <span><a href="#" class="tag-cloud-link">{{ $item->name }}</a></span>
                            @endforeach
                        </div>
                    </div>
                    <div class="text-justify-center">
                        <a href="{{route('client.show')}}"><img src="/frontend/images/button-booking.png" alt="" width="300"></a>
                    </div>
                </div>
                
            </div>
        </div>
    </section> <!-- .section -->
@endsection
