@extends('layouts.master')
@section('title')
    Thông tin đặt lịch
@endsection
@section('contents')


    <section class="hero-wrap hero-wrap-2" style="background-image:
                          url('images/bg-1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end
          justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <h2 class="mb-0 bread">Thông tin đặt lịch</h2>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang
                                chủ <i class="ion-ios-arrow-round-forward"></i></a></span>
                        <span>Đặt lịch</span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-degree-bg">
        <!-- Modal danh sách salon -->
        <div class="modal fade card-footer my-5 p-4" id="listSalon" data-backdrop="false"
            aria-labelledby="exampleModalScrollableTitle">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1>Danh sách salon</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>

                    </div>

                    <div class="result-salon" id="result-salon">
                        <div class="row justify-content-between ">
                            <div class="filter-district col-4" role="presentation">
                                <select style="border: 2px solid black;padding:10px;,margin:10px;border-radius:5px;"
                                    id="Cate">
                                    <option value="">Tất cả Quận/Huyện</option>
                                 
                                        <option value="">Q. Cầu Giấy</option>
                                  
                                </select>
                            </div>
                            <div class="filter-district col-md-6" role="presentation">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                      </svg></span>
                                    </div>
                                    <input type="text" class="form-control form-input input-search" placeholder="Tìm kiếm salon..." aria-label="Search" aria-describedby="basic-addon1">
                                    <div class="search-ajax">

                                    </div>
                                  </div>
                            </div>
                        </div>

                        @foreach ($salon as $item)

                            <div class="salon__item show" role="presentation">
                                <div class="item">
                                    <div class="flex">
                                        <div class="item__media" style="width: 30%;">
                                            <div class="relative">
                                                <div class="placehoder" style="height: inherit;"><img
                                                        class="block w-full"
                                                        src="{{ url('uploads') }}/{{ $item->image }}" alt="">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="item__content w-70" style="width: 70%;">
                                            <div class="item__address">{{ $item->address }}</div>
                                            <div class="flex"></div>
                                            <div class="item__note">{{ $item->description }}</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
        <!--End Modal danh sách salon -->

        <!-- Modal service -->
        <div class="modal fade card-footer my-5 p-4" id="listService" data-backdrop="false"
            aria-labelledby="exampleModalScrollableTitle">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>Danh Sách Dịch Vụ</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>
                    <div class="booking-service">
                        <div>
                            <div class="" id=" category-1">
                                <div class="service">
                                    <div class="service__category">
                                        <div class="category__name">CẮT GỘI MASSAGE</div>
                                        <div class="category__number">5 dịch vụ</div>
                                    </div>
                                    <div class="service__list">
                                        <div
                                            class="swiper-container sw swiper-container-initialized swiper-container-horizontal bbb_viewed_slider_container">
                                            <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                                                <div class="owl-carousel bbb_viewed_slider">
                                                    <div class="swiper-slide list__item swiper-slide-active">
                                                        <div class="item__media pointer ">
                                                            <img src="https://storage.30shine.com/service/combo_booking/364.jpg"
                                                                alt="">
                                                        </div>
                                                        <div class="item__title pointer ">Tẩy da chết sủi bọt, Đắp mặt
                                                            nạ</div>
                                                        <div class="item__description pointer ">Trắng sáng tức thì, da
                                                            mịn màng chắc khỏe</div>
                                                        <div class="item__price pointer">
                                                            <div class="meta__price"><span
                                                                    class="meta__newPrice">40K</span></div>
                                                        </div>
                                                        <div class="item__button ">Chọn</div>
                                                    </div>

                                                    <div class=" swiper-slide list__item swiper-slide-active">
                                                        <div class="item__media pointer ">
                                                            <img src="https://storage.30shine.com/service/combo_booking/364.jpg"
                                                                alt="">
                                                        </div>
                                                        <div class="item__title pointer ">Tẩy da chết sủi bọt, Đắp mặt
                                                            nạ</div>
                                                        <div class="item__description pointer ">Trắng sáng tức thì, da
                                                            mịn màng chắc khỏe</div>
                                                        <div class="item__price pointer">
                                                            <div class="meta__price"><span
                                                                    class="meta__newPrice">40K</span></div>
                                                        </div>
                                                        <div class="item__button ">Chọn</div>
                                                    </div>

                                                    <div class="swiper-slide list__item swiper-slide-active">
                                                        <div class="item__media pointer ">
                                                            <img src="https://storage.30shine.com/service/combo_booking/364.jpg"
                                                                alt="">
                                                        </div>
                                                        <div class="item__title pointer ">Tẩy da chết sủi bọt, Đắp mặt
                                                            nạ</div>
                                                        <div class="item__description pointer ">Trắng sáng tức thì, da
                                                            mịn màng chắc khỏe</div>
                                                        <div class="item__price pointer">
                                                            <div class="meta__price"><span
                                                                    class="meta__newPrice">40K</span></div>
                                                        </div>
                                                        <div class="item__button ">Chọn</div>
                                                    </div>

                                                    <div class="swiper-slide list__item swiper-slide-active">
                                                        <div class="item__media pointer ">
                                                            <img src="https://storage.30shine.com/service/combo_booking/364.jpg"
                                                                alt="">
                                                        </div>
                                                        <div class="item__title pointer ">Tẩy da chết sủi bọt, Đắp mặt
                                                            nạ</div>
                                                        <div class="item__description pointer ">Trắng sáng tức thì, da
                                                            mịn màng chắc khỏe</div>
                                                        <div class="item__price pointer">
                                                            <div class="meta__price"><span
                                                                    class="meta__newPrice">40K</span></div>
                                                        </div>
                                                        <div class="item__button ">Chọn</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="" id=" category-2">
                                <div class="service">
                                    <div class="service__category">
                                        <div class="category__name">COMBO CHĂM SÓC DA - THƯ GIÃN (DÙNG KÈM)</div>
                                        <div class="category__number">7 dịch vụ</div>
                                    </div>
                                    <div class="service__list">
                                        <div
                                            class="swiper-container swiper-container-initialized swiper-container-horizontal">
                                            <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                                                <div class="owl-carousel bbb_viewed_slider">
                                                    <div class="swiper-slide list__item swiper-slide-active">
                                                        <div class="item__media pointer ">
                                                            <img src="https://storage.30shine.com/service/combo_booking/364.jpg"
                                                                alt="">
                                                        </div>
                                                        <div class="item__title pointer ">Tẩy da chết sủi bọt, Đắp mặt
                                                            nạ</div>
                                                        <div class="item__description pointer ">Trắng sáng tức thì, da
                                                            mịn màng chắc khỏe</div>
                                                        <div class="item__price pointer">
                                                            <div class="meta__price"><span
                                                                    class="meta__newPrice">40K</span></div>
                                                        </div>
                                                        <div class="item__button ">Chọn</div>
                                                    </div>

                                                    <div class=" swiper-slide list__item swiper-slide-active">
                                                        <div class="item__media pointer ">
                                                            <img src="https://storage.30shine.com/service/combo_booking/364.jpg"
                                                                alt="">
                                                        </div>
                                                        <div class="item__title pointer ">Tẩy da chết sủi bọt, Đắp mặt
                                                            nạ</div>
                                                        <div class="item__description pointer ">Trắng sáng tức thì, da
                                                            mịn màng chắc khỏe</div>
                                                        <div class="item__price pointer">
                                                            <div class="meta__price"><span
                                                                    class="meta__newPrice">40K</span></div>
                                                        </div>
                                                        <div class="item__button ">Chọn</div>
                                                    </div>

                                                    <div class="swiper-slide list__item swiper-slide-active">
                                                        <div class="item__media pointer ">
                                                            <img src="https://storage.30shine.com/service/combo_booking/364.jpg"
                                                                alt="">
                                                        </div>
                                                        <div class="item__title pointer ">Tẩy da chết sủi bọt, Đắp mặt
                                                            nạ</div>
                                                        <div class="item__description pointer ">Trắng sáng tức thì, da
                                                            mịn màng chắc khỏe</div>
                                                        <div class="item__price pointer">
                                                            <div class="meta__price"><span
                                                                    class="meta__newPrice">40K</span></div>
                                                        </div>
                                                        <div class="item__button ">Chọn</div>
                                                    </div>

                                                    <div class="swiper-slide list__item swiper-slide-active">
                                                        <div class="item__media pointer ">
                                                            <img src="https://storage.30shine.com/service/combo_booking/364.jpg"
                                                                alt="">
                                                        </div>
                                                        <div class="item__title pointer ">Tẩy da chết sủi bọt, Đắp mặt
                                                            nạ</div>
                                                        <div class="item__description pointer ">Trắng sáng tức thì, da
                                                            mịn màng chắc khỏe</div>
                                                        <div class="item__price pointer">
                                                            <div class="meta__price"><span
                                                                    class="meta__newPrice">40K</span></div>
                                                        </div>
                                                        <div class="item__button ">Chọn</div>
                                                    </div>
                                                </div>
                                            </div><span class="swiper-notification" aria-live="assertive"
                                                aria-atomic="true"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="" id=" category-3">
                                <div class="service">
                                    <div class="service__category">
                                        <div class="category__name">UỐN HÀN QUỐC 8 CẤP ĐỘ</div>
                                        <div class="category__number">6 dịch vụ</div>
                                    </div>
                                    <div class="service__list">
                                        <div
                                            class="swiper-container swiper-container-initialized swiper-container-horizontal">
                                            <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                                                <div class="owl-carousel bbb_viewed_slider">
                                                    <div class="swiper-slide list__item swiper-slide-active">
                                                        <div class="item__media pointer ">
                                                            <img src="https://storage.30shine.com/service/combo_booking/364.jpg"
                                                                alt="">
                                                        </div>
                                                        <div class="item__title pointer ">Tẩy da chết sủi bọt, Đắp mặt
                                                            nạ</div>
                                                        <div class="item__description pointer ">Trắng sáng tức thì, da
                                                            mịn màng chắc khỏe</div>
                                                        <div class="item__price pointer">
                                                            <div class="meta__price"><span
                                                                    class="meta__newPrice">40K</span></div>
                                                        </div>
                                                        <div class="item__button ">Chọn</div>
                                                    </div>

                                                    <div class=" swiper-slide list__item swiper-slide-active">
                                                        <div class="item__media pointer ">
                                                            <img src="https://storage.30shine.com/service/combo_booking/364.jpg"
                                                                alt="">
                                                        </div>
                                                        <div class="item__title pointer ">Tẩy da chết sủi bọt, Đắp mặt
                                                            nạ</div>
                                                        <div class="item__description pointer ">Trắng sáng tức thì, da
                                                            mịn màng chắc khỏe</div>
                                                        <div class="item__price pointer">
                                                            <div class="meta__price"><span
                                                                    class="meta__newPrice">40K</span></div>
                                                        </div>
                                                        <div class="item__button ">Chọn</div>
                                                    </div>

                                                    <div class="swiper-slide list__item swiper-slide-active">
                                                        <div class="item__media pointer ">
                                                            <img src="https://storage.30shine.com/service/combo_booking/364.jpg"
                                                                alt="">
                                                        </div>
                                                        <div class="item__title pointer ">Tẩy da chết sủi bọt, Đắp mặt
                                                            nạ</div>
                                                        <div class="item__description pointer ">Trắng sáng tức thì, da
                                                            mịn màng chắc khỏe</div>
                                                        <div class="item__price pointer">
                                                            <div class="meta__price"><span
                                                                    class="meta__newPrice">40K</span></div>
                                                        </div>
                                                        <div class="item__button ">Chọn</div>
                                                    </div>

                                                    <div class="swiper-slide list__item swiper-slide-active">
                                                        <div class="item__media pointer ">
                                                            <img src="https://storage.30shine.com/service/combo_booking/364.jpg"
                                                                alt="">
                                                        </div>
                                                        <div class="item__title pointer ">Tẩy da chết sủi bọt, Đắp mặt
                                                            nạ</div>
                                                        <div class="item__description pointer ">Trắng sáng tức thì, da
                                                            mịn màng chắc khỏe</div>
                                                        <div class="item__price pointer">
                                                            <div class="meta__price"><span
                                                                    class="meta__newPrice">40K</span></div>
                                                        </div>
                                                        <div class="item__button ">Chọn</div>
                                                    </div>
                                                </div>
                                            </div><span class="swiper-notification" aria-live="assertive"
                                                aria-atomic="true"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="" id=" category-4">
                                <div class="service">
                                    <div class="service__category">
                                        <div class="category__name">NHUỘM CAO CẤP</div>
                                        <div class="category__number">5 dịch vụ</div>
                                    </div>
                                    <div class="service__list">
                                        <div
                                            class="swiper-container swiper-container-initialized swiper-container-horizontal">
                                            <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                                                <div class="owl-carousel bbb_viewed_slider">
                                                    <div class="swiper-slide list__item swiper-slide-active">
                                                        <div class="item__media pointer ">
                                                            <img src="https://storage.30shine.com/service/combo_booking/364.jpg"
                                                                alt="">
                                                        </div>
                                                        <div class="item__title pointer ">Tẩy da chết sủi bọt, Đắp mặt
                                                            nạ</div>
                                                        <div class="item__description pointer ">Trắng sáng tức thì, da
                                                            mịn màng chắc khỏe</div>
                                                        <div class="item__price pointer">
                                                            <div class="meta__price"><span
                                                                    class="meta__newPrice">40K</span></div>
                                                        </div>
                                                        <div class="item__button ">Chọn</div>
                                                    </div>

                                                    <div class=" swiper-slide list__item swiper-slide-active">
                                                        <div class="item__media pointer ">
                                                            <img src="https://storage.30shine.com/service/combo_booking/364.jpg"
                                                                alt="">
                                                        </div>
                                                        <div class="item__title pointer ">Tẩy da chết sủi bọt, Đắp mặt
                                                            nạ</div>
                                                        <div class="item__description pointer ">Trắng sáng tức thì, da
                                                            mịn màng chắc khỏe</div>
                                                        <div class="item__price pointer">
                                                            <div class="meta__price"><span
                                                                    class="meta__newPrice">40K</span></div>
                                                        </div>
                                                        <div class="item__button ">Chọn</div>
                                                    </div>

                                                    <div class="swiper-slide list__item swiper-slide-active">
                                                        <div class="item__media pointer ">
                                                            <img src="https://storage.30shine.com/service/combo_booking/364.jpg"
                                                                alt="">
                                                        </div>
                                                        <div class="item__title pointer ">Tẩy da chết sủi bọt, Đắp mặt
                                                            nạ</div>
                                                        <div class="item__description pointer ">Trắng sáng tức thì, da
                                                            mịn màng chắc khỏe</div>
                                                        <div class="item__price pointer">
                                                            <div class="meta__price"><span
                                                                    class="meta__newPrice">40K</span></div>
                                                        </div>
                                                        <div class="item__button ">Chọn</div>
                                                    </div>

                                                    <div class="swiper-slide list__item swiper-slide-active">
                                                        <div class="item__media pointer ">
                                                            <img src="https://storage.30shine.com/service/combo_booking/364.jpg"
                                                                alt="">
                                                        </div>
                                                        <div class="item__title pointer ">Tẩy da chết sủi bọt, Đắp mặt
                                                            nạ</div>
                                                        <div class="item__description pointer ">Trắng sáng tức thì, da
                                                            mịn màng chắc khỏe</div>
                                                        <div class="item__price pointer">
                                                            <div class="meta__price"><span
                                                                    class="meta__newPrice">40K</span></div>
                                                        </div>
                                                        <div class="item__button ">Chọn</div>
                                                    </div>
                                                </div>
                                            </div><span class="swiper-notification" aria-live="assertive"
                                                aria-atomic="true"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="new-affix-v2">
                        <div class="flex space-between text-center content-step">
                            <div class="right button-next pointer btn-inactive" role="presentation"><span>Chọn dịch
                                    vụ</span></div>
                        </div>
<section class="hero-wrap hero-wrap-2" style="background-image:
              url('images/bg-1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end
          justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h2 class="mb-0 bread">Thông tin đặt lịch</h2>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang
                            chủ <i class="ion-ios-arrow-round-forward"></i></a></span>
                    <span>Đặt lịch</span>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-degree-bg">
    <!-- Modal danh sách salon -->
    <div class="modal fade card-footer my-5 p-4" id="listSalon" data-backdrop="false" aria-labelledby="exampleModalScrollableTitle">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1>Danh sách salon</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>

                </div>
                <div class="input-group md-form form-sm form-1 pl-0">
                    <div class="input-group-prepend">
                        <span class="input-group-text purple lighten-3" id="basic-text1"><i class="fas fa-search text-white" aria-hidden="true"></i></span>
                    </div>
                    <input class="form-control my-0 py-1" type="text" placeholder="Search" aria-label="Search">
                </div>
                <div class="result-salon" id="result-salon">
                    <div class="filter-district" role="presentation">
                        <div class="box-filter">

                            <select class="select">
                                <option>Q. Cầu Giấy</option>
                                <option>Danh sách 02</option>
                                <option>Danh sách 03</option>
                                <option>Danh sách 03</option>
                            </select>

                            <div class="icon"><img src="/static/media/caretRight.b0d191b3.svg" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="salon__item show" role="presentation">
                        @foreach ($salon as $item)
                        <div class="item">
                            <div class="flex">
                                <div class="item__media" style="width: 30%;">
                                    <div class="relative">
                                        <div class="placehoder" style="height: inherit;"><img class="block w-full" src="{{ url('uploads') }}/{{ $item->image }} " alt="">
                                        </div>
                                        <div class="parking-salon"><img src="/static/media/parking.44ab7007.svg" alt=""></div>
                                    </div>
                                </div>
                                <div class="item__content w-70" style="width: 70%;">
                                    <div class="item__address">{{$item->address}}</div>
                                    <div class="flex"></div>
                                    <div class="item__note">{{$item->description}} </div>

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
    <!--End Modal danh sách salon -->

    <!-- Modal service -->
    <div class="modal fade card-footer my-5 p-4" id="listService" data-backdrop="false" aria-labelledby="exampleModalScrollableTitle">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Danh Sách Dịch Vụ</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                <div class="booking-service">
                    <div>
                        @foreach ($cateService as $item)
                        <div class="" id=" category-1">
                            <div class="service">
                                <div class="service__category">
                                    <div class="category__name">{{$item['name_cate']}}</div>
                                    <div class="category__number"> {{count($item['services'])}} dịch vụ</div>
                                </div>

                                <div class="service__list container">

                                    <div class="row col-md-12" id="cate_{{$item['id']}}">
                                     
                                        @foreach ($item['services'] as $service)   
                                        <div class="col-md-4" >
                                            <div class="" id="c_s_{{$item['id']}}_{{$service['id']}}">
                                                <div class="swiper-slide list__item swiper-slide-active">
                                                    <div class="item__media pointer ">
                                                        <img src="https://storage.30shine.com/service/combo_booking/364.jpg" alt="">
                                                    </div>
                                                    <div class="item__title pointer ">{{$service['name']}}</div>
                                                    <div class="item__description pointer "> </div>
                                                    <div class="item__price pointer">
                                                        <div class="meta__price"><span class="meta__newPrice">{{$service['price']}}</span></div>
                                                    </div>
                                                    <div class="item__button" data-cate_id="{{$item['id']}}" data-service_id="{{$service['id']}}">Chọn</div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="new-affix-v2">
                    <div class="flex space-between text-center content-step">
                        <div class="right button-next pointer btn-inactive" role="presentation"><span>Chọn dịch
                                vụ</span></div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Modal service -->

        <div class="container">
            <div class="row">
                <div class="row justify-content-center">
                    <div class="col-md-10 ftco-animate">
                        <form action="" class="appointment-form">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3>1.CHỌN SALON</h3>
                                    <div class="input-group mb-3">
                                        <input type="select" class="form-control" placeholder="Chọn salon">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary form-control" type="button"
                                                data-toggle="modal" data-target="#listSalon">></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <h3>2.CHỌN DỊCH VỤ</h3>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Nhập Tên Dịch Vụ">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary form-control" type="button"
                                                data-toggle="modal" data-target="#listService">></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <h5>Anh đi cắt cùng nhiều người ? (nếu khung giờ không đủ
                                        thợ cho cả nhóm salon sẽ gọi xác nhận lại)</h5>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="" placeholder="VD: ĐI cùng 3 người">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <h3>3.CHỌN NGÀY CẮT</h3>
                                    <div class="form-group">
                                        <input type="date" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="box-time" id="box-time">
                                        <div class="relative">
                                            <div
                                                class="swiper-container swiper-container-initialized swiper-container-horizontal">
                                                <div class="swiper-wrapper"
                                                    style="transition-duration: 0ms; transform: translate3d(-367.692px, 0px, 0px);">
                                                    <div class="swiper-slide box-time_gr"
                                                        style="width: 83.9231px; margin-right: 8px;">
                                                        <div class="box-time_item   " role="presentation">7h00</div>
                                                        <div class="box-time_item   " role="presentation">7h20</div>
                                                        <div class="box-time_item   " role="presentation">7h40</div>
                                                    </div>
                                                    <div class="swiper-slide box-time_gr"
                                                        style="width: 83.9231px; margin-right: 8px;">
                                                        <div class="box-time_item   " role="presentation">8h00</div>
                                                        <div class="box-time_item  " role="presentation">8h20</div>
                                                        <div class="box-time_item  " role="presentation">8h40</div>
                                                    </div>
                                                    <div class="swiper-slide box-time_gr"
                                                        style="width: 83.9231px; margin-right: 8px;">
                                                        <div class="box-time_item   " role="presentation">9h00</div>
                                                        <div class="box-time_item   " role="presentation">9h20</div>
                                                        <div class="box-time_item  " role="presentation">9h40</div>
                                                    </div>
                                                    <div class="swiper-slide box-time_gr swiper-slide-prev"
                                                        style="width: 83.9231px; margin-right: 8px;">
                                                        <div class="box-time_item   " role="presentation">10h00</div>
                                                        <div class="box-time_item  " role="presentation">10h20</div>
                                                        <div class="box-time_item  " role="presentation">10h40</div>
                                                    </div>
                                                    <div class="swiper-slide box-time_gr swiper-slide-active"
                                                        style="width: 83.9231px; margin-right: 8px;">
                                                        <div class="box-time_item   " role="presentation">11h00</div>
                                                        <div class="box-time_item   " role="presentation">11h20</div>
                                                        <div class="box-time_item  " role="presentation">11h40</div>
                                                    </div>
                                                    <div class="swiper-slide box-time_gr swiper-slide-next"
                                                        style="width: 83.9231px; margin-right: 8px;">
                                                        <div class="box-time_item   " role="presentation">12h00</div>
                                                        <div class="box-time_item   " role="presentation">12h20</div>
                                                        <div class="box-time_item   " role="presentation">12h40</div>
                                                    </div>
                                                    <div class="swiper-slide box-time_gr"
                                                        style="width: 83.9231px; margin-right: 8px;">
                                                        <div class="box-time_item   " role="presentation">13h00</div>
                                                        <div class="box-time_item   " role="presentation">13h20</div>
                                                        <div class="box-time_item   " role="presentation">13h40</div>
                                                    </div>
                                                    <div class="swiper-slide box-time_gr"
                                                        style="width: 83.9231px; margin-right: 8px;">
                                                        <div class="box-time_item   " role="presentation">14h00</div>
                                                        <div class="box-time_item   " role="presentation">14h20</div>
                                                        <div class="box-time_item   " role="presentation">14h40</div>
                                                    </div>
                                                    <div class="swiper-slide box-time_gr"
                                                        style="width: 83.9231px; margin-right: 8px;">
                                                        <div class="box-time_item   " role="presentation">15h00</div>
                                                        <div class="box-time_item   " role="presentation">15h20</div>
                                                        <div class="box-time_item   " role="presentation">15h40</div>
                                                    </div>
                                                    <div class="swiper-slide box-time_gr"
                                                        style="width: 83.9231px; margin-right: 8px;">
                                                        <div class="box-time_item   " role="presentation">16h00</div>
                                                        <div class="box-time_item   " role="presentation">16h20</div>
                                                        <div class="box-time_item   " role="presentation">16h40</div>
                                                    </div>
                                                    <div class="swiper-slide box-time_gr"
                                                        style="width: 83.9231px; margin-right: 8px;">
                                                        <div class="box-time_item   " role="presentation">17h00</div>
                                                        <div class="box-time_item   " role="presentation">17h20</div>
                                                        <div class="box-time_item   " role="presentation">17h40</div>
                                                    </div>
                                                    <div class="swiper-slide box-time_gr"
                                                        style="width: 83.9231px; margin-right: 8px;">
                                                        <div class="box-time_item   " role="presentation">18h00</div>
                                                        <div class="box-time_item   " role="presentation">18h20</div>
                                                        <div class="box-time_item   " role="presentation">18h40</div>
                                                    </div>
                                                    <div class="swiper-slide box-time_gr"
                                                        style="width: 83.9231px; margin-right: 8px;">
                                                        <div class="box-time_item   " role="presentation">19h00</div>
                                                        <div class="box-time_item   " role="presentation">19h20</div>
                                                        <div class="box-time_item   " role="presentation">19h40</div>
                                                    </div>
                                                    <div class="swiper-slide box-time_gr"
                                                        style="width: 83.9231px; margin-right: 8px;">
                                                        <div class="box-time_item   " role="presentation">20h00</div>
                                                        <div class="box-time_item   " role="presentation">20h20</div>
                                                        <div class="box-time_item  " role="presentation">20h40</div>
                                                    </div>
                                                    <div class="swiper-slide box-time_gr"
                                                        style="width: 83.9231px; margin-right: 8px;">
                                                        <div class="box-time_item   " role="presentation">21h00</div>
                                                        <div class="box-time_item  " role="presentation">21h20</div>
                                                        <div class="box-time_item " role="presentation">21h40</div>
                                                    </div>
                                                    <div class="swiper-slide box-time_gr"
                                                        style="width: 83.9231px; margin-right: 8px;">
                                                        <div class="box-time_item   " role="presentation">22h00</div>
                                                        <div class="box-time_item  " role="presentation">22h20</div>
                                                        <div class="box-time_item " role="presentation">22h40</div>
                                                    </div>
                                                    <div class="swiper-slide box-time_gr"
                                                        style="width: 83.9231px; margin-right: 8px;">
                                                        <div class="box-time_item   " role="presentation">23h00</div>
                                                        <div class="box-time_item   " role="presentation">23h20</div>
                                                        <div class="box-time_item  " role="presentation">23h40</div>
                                                    </div>
                                                </div><span class="swiper-notification" aria-live="assertive"
                                                    aria-atomic="true">
                                                    Không có giờ nào phù hợp với anh
                                                </span>
                                            </div>
                                        </div>
                                        <div class=""></div>
                  </div>
                </div>
                <div class="
                                            col-sm-12 mb-3">
                                            <div class="form-group">
                                                <label for="" class="form-control-label col-md-3 col-6">
                                                    <h5>Yêu cầu tư vấn</h5>
                                                </label>
                                                <button type="button" class="btn btn-toggle" data-toggle="button"
                                                    aria-pressed="false" autocomplete="on">
                                                    <div class="handle"></div>
                                                </button>
                                                <p class="col-sm-12">(Anh chị có muốn nghe thông tin về các chương
                                                    trình bán hàng, khuyến mãi, giảm
                                                    giá?)</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="" class="form-control-label col-md-3 col-6">
                                                    <h5>Chụp hình sau khi cắt</h5>
                                                </label>
                                                <button type="button" class="btn btn-toggle" data-toggle="button"
                                                    aria-pressed="false" autocomplete="on">
                                                    <div class="handle"></div>
                                                </button>
                                                <p class="col-sm-12">(Anh chị có muốn chụp hình lưu lại kiểu tóc,
                                                    để lần sau không phải mô tả lại
                                                    cho thợ khác?)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Đặt Lịch Ngay"
                                            class="btn
                    btn-primary">
                                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    </div>
    </section> <!-- .section -->

@endsection

 
<style>
    .btn-selected{
        
        background: #b98d58;
    color: #fff !important;
    border: #b98d58 !important;
    }
</style>
@endsection

@section('scripts')
<script>
    $('.item__button').on('click',function(){
        cate_id = $(this).data('cate_id')
        service_id = $(this).data('service_id')
        $('#cate_'+cate_id+' .item__button').removeClass('btn-selected');
        $(this).addClass('btn-selected');
    });
</script>
@endsection
