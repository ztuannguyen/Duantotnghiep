<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark
      ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <?php
        $logo = DB::table('logos')->where('status',0)->get();
      ?>
      @foreach ($logo as $item)
      <a class="navbar-brand" href="index.html"><img src="{{ asset('uploads/' . $item->image) }}" width="200" height="50"></a>
      @endforeach
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
        aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index.html" class="nav-link">Trang chủ</a></li>
          <li class="nav-item"><a href="{{route('client.service')}}" class="nav-link">Dịch
              vụ</a></li>
          <li class="nav-item"><a href="gallery.html" class="nav-link">Gallery</a></li>
          <li class="nav-item"><a href="about.html" class="nav-link">Về chúng
              tôi</a></li>
          <li class="nav-item "><a href="{{route('client.blog')}}" class="nav-link">Blog</a></li>

          <li class="nav-item"><a href="contact.html" class="nav-link">Liên hệ</a></li>
          @if (!Auth::check())
            <li class="nav-item"><a href="{{route('client.login')}}" class="nav-link">Đăng nhập</a></li>
          @else
            <li class="nav-item"><a href="javascript:void(0)" class="nav-link">{{Auth::user()->name}}</a></li>
            <li class="nav-item"><a href="{{route('client.logout')}}" class="nav-link">Thoát</a></li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->