@extends('layouts.master')
@section('title')
    Bài Viết
@endsection
@section('contents')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('frontend/images/bg-1.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h2 class="mb-0 bread">Blog</h2>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang Chủ<i
                                    class="ion-ios-arrow-round-forward"></i></a></span> <span>Blog <i
                                class="ion-ios-arrow-round-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    @foreach ($data as $item)
                        <div class="row">
                            <div class="col-md-12 d-flex ftco-animate">
                                <div class="blog-entry align-self-stretch d-md-flex">
                                    <a href="{{ route('client.detailBlog', ['id' => $item->id]) }}" class="block-20">
                                        <div class="mt-3">
                                            <img src="{{ asset('uploads/' . $item->image) }}" alt="{{ $item->title }}" width="400" height="200">
                                        </div>
                                    </a>
                                    <div class="text d-block pl-md-4">
                                       
                                        <h3 class="heading mt-2"><a
                                                href="{{ route('client.detailBlog', ['id' => $item->id]) }}">{{ $item->title }}</a>
                                        </h3>
                                        <p>{{ $item->description }}</p>
                                        <p><a href="{{ route('client.detailBlog', ['id' => $item->id]) }}"
                                                class="btn btn-primary py-2 px-3">Đọc Thêm</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row mt-5">
                        <div class="col">
                            <div class="block-27 pagination">
                                <ul>
                                    {!! $data->links() !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar ftco-animate">
                    <div class="sidebar-box bg-light">
                        <form action="{{ route('search') }}" method="GET" class="search-form bg-light">
                            @csrf
                            <div class="form-group">
                                <span class="icon ion-ios-search"></span>
                                <input type="text" class="form-control" name="title" placeholder="Search...">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box bg-light ftco-animate">
                        <h3 class="heading-2">Danh mục bài viết</h3>
                        <ul class="categories">
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
                                <li><a href="{{ route('category', ['id' => $item->id]) }}">{{ $item->name }}
                                        <span>({{ count($blog) }})</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- .section -->

@endsection
