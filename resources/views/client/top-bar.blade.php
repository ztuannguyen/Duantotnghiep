<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark
      ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <?php
        $logo = DB::table('logos')
            ->where('status', 0)
            ->get();
        ?>
        @foreach ($logo as $item)
            <a class="navbar-brand" href="{{ route('client.home') }}"><img src="{{ asset('uploads/' . $item->image) }}" width="200"
                    height="50"></a>
        @endforeach
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{ route('client.home') }}" class="nav-link">Trang chủ</a>
                </li>
                <li class="nav-item"><a href="{{ route('client.about') }}" class="nav-link">Giới thiệu</a>
                </li>
                <li class="nav-item"><a href="{{ route('client.service') }}" class="nav-link">Dịch
                        vụ</a></li>
                <li class="nav-item "><a href="{{ route('client.blog') }}" class="nav-link">Blog</a></li>

                <li class="nav-item"><a href="contact.html" class="nav-link">Liên hệ</a></li>
                @if (!Auth::check())
                    <li class="nav-item"><a href="{{ route('client.login') }}" class="nav-link">Đăng
                            nhập</a></li>
                @else
                    <div class="dropdown collapse navbar-collapse nav-item">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <b style="color:rgb(158, 68, 4);">{{ Auth::user()->name }}</b>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('client.list')}}">Quản lý đơn hàng</a>
                            <a class="dropdown-item" href="{{ route('client.logout') }}">Đăng xuất</a>
                        </div>
                    </div>
                @endif

            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
