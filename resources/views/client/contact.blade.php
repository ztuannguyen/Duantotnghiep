@extends('layouts.master')
@section('title')
    Liên hệ
@endsection
@section('contents')
@csrf
<section class="hero-wrap hero-wrap-2" style="background-image: url('frontend/images/bg-1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
          <h2 class="mb-0 bread">Liên hệ</h2>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ <i class="ion-ios-arrow-round-forward"></i></a></span> <span class="mr-2"><a href="contact.html">Liên hệ <i class="ion-ios-arrow-forward"></i></a></span> <span>Liên hệ <i class="ion-ios-arrow-round-forward"></i></span></p>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row content" style="margin-top: -10px;">
        <div class="col-sm-12" style="background-color: #f5f2ea;">
          <h1>Liên hệ với chúng tôi</h1>
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.8142804079735!2d105.84295271533186!3d21.000080494131744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac71132ea2b5%3A0xab941ece69bef2a7!2zODIgVHLhuqduIMSQ4bqhaSBOZ2jEqWEsIMSQ4buTbmcgVMOibSwgSGFpIELDoCBUcsawbmcsIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1625833611837!5m2!1svi!2s"
            width="600" height="340" loading="lazy" style="border:0;width:100%"></iframe>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6" style="background-color:#f5f2ea;">
          <section class="mb-4">

            <!--Section heading-->
            <h4 class="h1-responsive font-weight-bold my-4">Chúng tôi trân
              trọng ý kiến của quý khách</h4>
            <!--Section description-->
            <p class=" w-responsive mx-auto mb-5" style="color: gray">Nếu bạn có gì thắc mắc hãy
              liên hệ với chúng tôi qua địa chỉ</p>
            <p class=" w-responsive mx-auto mb-5" style="color: gray">Điện
              thoại<br>
              1900.27.27.30</p>
            <p class=" w-responsive mx-auto mb-5" style="color: gray"><span>Điạ
                chỉ</span><br><span>Số 82 Trần
                Đại Nghĩa, phường Đồng Tâm, quận Hai Bà Trưng, Hà Nội.</span></p>
            <p class=" w-responsive mx-auto mb-5" style="color: gray"><span>Email</span><br><span>BrotherHoods@gmail.com</span></p>

            <p class=" w-responsive mx-auto mb-5" style="color: gray"><span>Thời
                gian</span><br><span>Tất cả
                các ngày trong tuần</span></p>

          </section>
          <!--Section: Contact v.2-->
        </div>

        <div class="col-sm-6" style="background-color:#f5f2ea;">
          <section class="mb-4">

            <!--Section heading-->
            <h4 class="h1-responsive font-weight-bold my-4">Gửi thắc mắc cho chúng tôi</h4>
            <!--Section description-->
            <p class=" w-responsive mx-auto mb-5" style="color: gray">Nếu bạn có thắc mắc gì, có thể gửi yêu cầu cho chúng tôi, và chúng tôi
              sẽ liên lạc lại với bạn sớm nhất có thể</p>

            <div class="row">

              <!--Grid column-->
              <div class="col-md-12 mb-md-0 mb-5">
                <form  action="{{ route('client.postContact') }}" method="POST">
                  @csrf
                  <!--Grid row-->
                  <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="name" class="">Họ và Tên (<a style="color: red">*</a>)</label>
                       
                        <input type="text" id="name" name="name" class="form-control" placeholder="Nhập họ và tên ...">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                      </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label for="tel" class="">Số điện thoại (<a style="color: red">*</a>)</label>
                        
                        <input type="tel" id="tel" name="phone_number" class="form-control" placeholder="Nhập số điện thoại ...">
                        @error('phone_number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                      </div>
                    </div>
                    <!--Grid column-->

                  </div>
                  <!--Grid row-->

                  <!--Grid row-->
                  {{-- <div class="row">
                    <div class="col-md-12">
                      <div class="md-form mb-0">
                        <label for="email" class="">Email</label>
                        <input type="text" id="email" name="email" class="form-control">
                        
                      </div>
                    </div>
                  </div> --}}
                  <!--Grid row-->

                  <!--Grid row-->
                  <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                      <div class="md-form">
                        <label for="message">Nội dung (<a style="color: red">*</a>)</label>
                        
                        <textarea type="text" id="message" name="note" rows="5"
                          class="form-control md-textarea" ></textarea>
                    @error('note')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                      </div>

                    </div>
                  </div>
                  <!--Grid row-->
                  <div class="text-center text-md-left">
                    <input type="submit" class="btn btn-primary" value="Gửi thông tin">
                  </div>
                  <div class="status"></div>
                </div>
                </form>

              <!--Grid column-->


            </div>

          </section>
          <!--Section: Contact v.2-->
        </div>
      </div>
    </div>
  </section>

@endsection