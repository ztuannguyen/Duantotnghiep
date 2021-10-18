@extends('layouts.master')
@section('title')
    Thông tin đặt lịch
@endsection
@section('contents')


    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg-1.jpg');"
        data-stellar-background-ratio="0.5">
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
    @if (session()->has('message'))
    <div class="alert alert-success" style="margin-top:30px;margin-left:20px">
      {{ session('message') }}
    </div>
    @endif
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
                    @foreach ($salon as $item)
                        <div class="salon__item show" role="presentation"
                            onclick="clickChiNhanh('{{ $item->id }}','{{ $item->address }}')">

                            <div class="item">
                                <div class="flex">
                                    <div class="item__media" style="width: 30%;">
                                        <div class="relative">
                                            <div class="placehoder" style="height: inherit;"><img class="block w-full"
                                                    src="{{ url('uploads') }}/{{ $item->image }} " alt="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="item__content w-70" style="width: 70%;">
                                        <div class="item__address">{{ $item->address }}</div>
                                        <div class="flex"></div>
                                        <div class="item__note">{{ $item->description }} </div>

                                    </div>
                                </div>
                            </div>


                        </div>
                    @endforeach
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
                        @foreach ($cateService as $item)
                            <div class="" id=" category-1">
                                <div class="service">
                                    <div class="service__category">
                                        <div class="category__name">{{ $item['name_cate'] }}</div>
                                        <div class="category__number">{{ count($item['services']) }} dịch vụ</div>
                                    </div>
                                    <div class="service__list">
                                        <div class="swiper-container bbb_viewed_slider_container row col-md-12"
                                            id="cate_{{ $item['id'] }}">
                                            <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                                                <div class="owl-carousel bbb_viewed_slider">
                                                    @foreach ($item['services'] as $service)
                                                        <div class="swiper-slide list__item swiper-slide-active">
                                                            <div class="item__media pointer ">
                                                                <img src="{{ url('uploads') }}/{{ $service['image'] }}"
                                                                    width="60" height="150" alt="">

                                                            </div>
                                                            <div class="item__title pointer ">{{ $service['name'] }}
                                                            </div>
                                                            <div class="item__description pointer ">
                                                                {{ $service['description'] }}
                                                            </div>
                                                            <div class="item__price pointer">
                                                                <div class="meta__price"><span
                                                                        class="meta__newPrice">{{ number_format($service['price']) }}đ</span>
                                                                </div>
                                                            </div>
                                                            <div class="item__button" data-cate_id="{{ $item['id'] }}"
                                                                data-service_id="{{ $service['id'] }}"
                                                                data-service_name="{{ $service['name'] }}"
                                                                onclick="toogleService(this)">Chọn</div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="new-affix-v2">
                        <div class="flex space-between text-center content-step">
                            <div class="right button-next pointer btn-inactive" id="click_service"><span>Chọn dịch vụ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Modal service -->

        <div class="container">
            <div class="row">
                <div class="row justify-content-center">
                    <div class="col-md-10 ftco-animate">
                        <div class="row">
                            <form action="{{ route('client.post') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-sm-12">
                                    <h3>1. Số điện thoại</h3>
                                    <div class="input-group mb-3">
                                        <input type="tel" class="form-control" name="number_phone"
                                            value="{{ old('number_phone') }}" placeholder="Nhập số điện thoại..">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <h3>2. Chọn Salon</h3>
                                    <input type="hidden" value="" id="id_chi_nhanh" name="salon_id">
                                    <div class="input-group mb-3" data-toggle="modal" data-target="#listSalon"
                                        id="choose_address">
                                        <input type="text" id="chi_nhanh" disabled class="form-control"
                                            placeholder="Chọn salon">
                                        <div class="input-group-append">
                                            <span class="input-group-text form-control"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                                </svg></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <h3>3. Chọn dịch vụ</h3>
                                    <div class="input-group mb-3" data-toggle="modal" data-target="#listService">
                                        <input type="text" id="dich_vu" class="form-control" disabled
                                            placeholder="Chọn Dịch Vụ">
                                        <div class="input-group-append">
                                            <span class="input-group-text form-control"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                                </svg></span>
                                        </div>
                                    </div>
                                    <div id="selected_services_container"></div>
                                </div>
                                <div class="col-sm-12">
                                    <h5>Anh đi cắt cùng nhiều người ? (nếu khung giờ không đủ
                                        thợ cho cả nhóm salon sẽ gọi xác nhận lại)</h5>
                                    <div class="input-group mb-3">
                                        <textarea name="note" class="form-control" value="{{ old('note') }}" rows="5"
                                            placeholder="VD : Anh đi cùng bạn bè , đi cùng con anh..."></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <h3>4. Chọn ngày cắt</h3>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" name="date_booking" value="{{ old('date_booking')}}" placeholder="Chọn ngày cắt ...">
                                        <div class="input-group-addon">
                                            <span><i class="bi bi-calendar-fill"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="box-time" id="box-time">
                                            <div class="relative">
                                                <div
                                                    class="swiper-container swiper-container-initialized swiper-container-horizontal">


                                                    <div id="atv" class="swiper-wrapper">
                                                        <input type="hidden" name="time_id" value="" id="id_time">
                                                        @foreach ($time as $item)
                                                            <div class="swiper-slide box-time_gr"
                                                                style="width: 83.9231px; margin-right: 8px;"
                                                                onclick="clickTime('{{ $item->id }}','{{ $item->time_start }}')">
                                                                <div class="box-time_item" role="presentation"
                                                                    id="thoi_gian">
                                                                    {{ $item->time_start }}
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <span class="swiper-notification" aria-live="assertive"
                                                        aria-atomic="true">
                                                        Không có giờ nào phù hợp với anh
                                                    </span>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <input type="hidden" name="status" value="1">

                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary">Đặt Lịch Ngay</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


@endsection

@section('scripts')
    <script>
        //SelectService
        var listSelectedServices = [];

        function toogleService(el) {
            let selectedService = {
                id: $(el).data('service_id'),
                cate_id: $(el).data('cate_id'),
                name: $(el).data('service_name')
            };

            if (listSelectedServices.some(e => e.id == selectedService.id)) {
                listSelectedServices = listSelectedServices.filter(item => item.id != selectedService.id);
            } else {
                listSelectedServices = listSelectedServices.filter(item => item.cate_id != selectedService.cate_id);
                $(`[data-cate_id="${selectedService.cate_id}"]`).removeClass('btn-selected');
                listSelectedServices.push(selectedService);
            }
            $(el).toggleClass('btn-selected');
            if (listSelectedServices.length > 0) {
                $('#click_service').text("Đã chọn " + listSelectedServices.length + " dịch vụ")
                document.getElementById('click_service').style.backgroundColor = " #b98d58"
            } else {
                $('#click_service').text("Chọn Dịch Vụ")
                document.getElementById('click_service').style.backgroundColor = " #d1d1d1"
            }

            $('#selected_services_container').html("");
            let textDisplay = "";
            listSelectedServices.forEach(element => {

                textDisplay += element.name + " - ";
                $('#selected_services_container').append(
                    `<input type="hidden" name="bookings_services[]" value="${element.id}">`
                );
            });

            textDisplay = textDisplay.substring(0, textDisplay.length - 2);
            $('#dich_vu').val(textDisplay);

        }
        $('#click_service').on('click', function() {
            $('#listService').modal('hide')

        });
        //choooseSalon
        function clickChiNhanh(id, address) {
            $('#listSalon').modal('hide')
            $('#id_chi_nhanh').val(id);
            $('#chi_nhanh').val(address);

        }
        $(document).ready(function() {
            $('#choose_address').click(function() {
                $('#listSalon').modal('show')
            })
        })
        //chooseTime
        function clickTime(id, time_start) {
            $('#id_time').val(id)
            $('#thoi_gian').val(time_start)
        }
        // Active time
        var header = document.getElementById("atv");
        var btns = header.getElementsByClassName("box-time_item");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                if (current.length > 0) {
                    current[0].className = current[0].className.replace(" active", "");
                }
                this.className += " active";
            });
        }
        $(document).ready(function(){
            let today = moment().format('YYYY-MM-DD');     
            let tomorrow  = moment().add(2,'days').format('YYYY-MM-DD');
            $('input[name=date_booking]').datepicker({
                format: 'yyyy-mm-d',
                startDate: today,
                endDate: tomorrow
            });
        })
    </script>

@endsection
