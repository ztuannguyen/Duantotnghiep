@extends('layouts.master')
@section('title')
    Chi tiết bài viết
@endsection
@section('contents')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('frontend/images/bg-1.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h2 class="mb-0 bread">Blog</h2>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="ion-ios-arrow-round-forward"></i></a></span> <span class="mr-2"><a
                                href="{{ route('client.blog') }}">Blog <i class="ion-ios-arrow-forward"></i></a></span>
                        <span>Chi tiết bài viết <i class="ion-ios-arrow-round-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <div class="blog_thumb">
                        <a href="#"><img src="{{ asset('uploads/' . collect($detail)->first()->image) }}"
                                alt="{{ collect($detail)->first()->image }}"></a>
                    </div>
                    <h2 class="mb-3 mt-3">{{ collect($detail)->first()->title }}</h2>
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



                    <div class="comment-form-wrap pt-5">
                        <h3 class="mb-5">Leave a comment</h3>
                        <form action="#" class="p-5 bg-light">
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="url" class="form-control" id="website">
                            </div>

                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                            </div>

                        </form>
                    </div>

                </div> <!-- .col-md-8 -->

                <div class="col-lg-4 sidebar ftco-animate">
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
                        <h3 class="heading-2">Bài viết liên quan</h3>
                        @foreach ($relates as $item)
                            <div class="block-21 mb-4 d-flex">
                                <a href="{{ route('client.detailBlog', ['id' => $item->id]) }}"><img
                                        src="{{ asset('uploads/' . $item->image) }}" alt="" width="180px"></a>
                                <div class="text">
                                    <h3 class="heading-1"><a
                                            href="{{ route('client.detailBlog', ['id' => $item->id]) }}">{{ $item->title }}</a>
                                    </h3>
                                    <div class="meta">
                                        <div><a href="#"><span class="icon-calendar"></span> {{$item->created_at}}</a></div>
                                     
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
                    </div>

                    <div class="sidebar-box bg-light ftco-animate">
                        <h3 class="heading-2">Paragraph</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus
                            voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur
                            similique, inventore eos fugit cupiditate numquam!</p>
                    </div> --}}
                </div>

            </div>
        </div>
    </section> <!-- .section -->
@endsection
