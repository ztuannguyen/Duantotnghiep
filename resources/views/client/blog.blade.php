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
                                        <img src="{{ asset('uploads/' . $item->image) }}" alt="{{ $item->title }}">
                                    </a>
                                    <div class="text d-block pl-md-4">
                                        <div class="meta mb-3">
                                            <div><a href="#">{{ $item->created_at }}</a></div>
                                            {{-- <div><a href="#">Admin</a></div>
                                            <div><a href="#" class="meta-chat"><span class="icon-chat"></span>
                                                    3</a>
                                            </div> --}}
                                        </div>
                                        <h3 class="heading"><a
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

                    <div class="sidebar-box bg-light ftco-animate">
                        <h3 class="heading-2">Bài viết gần đây</h3>
                        <div class="block-21 mb-4 d-flex">
                            <a class="blog-img mr-4" style="background-image: url(images/work-1.jpg);"></a>
                            <div class="text">
                                <h3 class="heading-1"><a href="#">Even the all-powerful Pointing has no control about
                                        the blind texts</a></h3>
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar"></span> Sept. 12, 2019</a></div>
                                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="sidebar-box bg-light ftco-animate">
                        <h3 class="heading-2">Tag Cloud</h3>
                        <div class="tagcloud">
                            <a href="#" class="tag-cloud-link">donate</a>
                            <a href="#" class="tag-cloud-link">charity</a>
                            <a href="#" class="tag-cloud-link">non-profit</a>
                            <a href="#" class="tag-cloud-link">organization</a>
                            <a href="#" class="tag-cloud-link">child</a>
                            <a href="#" class="tag-cloud-link">abuse</a>
                            <a href="#" class="tag-cloud-link">help</a>
                            <a href="#" class="tag-cloud-link">volunteer</a>
                        </div>
                    </div> --}}

                </div>

            </div>
        </div>
    </section> <!-- .section -->

@endsection
