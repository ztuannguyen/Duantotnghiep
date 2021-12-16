@section('side-bar')

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
    @can('admin')
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/dashboard">
            <img src="/admin/img/logo.png" alt="" width="130">
        </a>
    @endcan
    @can('staff')
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/bookings">
            <img src="/admin/img/logo.png" alt="" width="130">
  
        </a>
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @can('admin')
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/admin/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Thống kê</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Quản Lý
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-th-list"></i>
            <span>Dịch vụ</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{Route('admin.cate_services.index')}}">Danh mục dịch vụ</a>
                <a class="collapse-item" href="{{Route('admin.services.index')}}">Danh sách dịch vụ</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-fw fa-building"></i>
            <span>Chi nhánh cửa hàng</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/admin/salons">Danh sách chi nhánh</a>
                <a class="collapse-item" href="/admin/times">Thời gian đặt lịch</a>
                <a class="collapse-item" href="/admin/chairs">Ghế làm</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.users.index')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Tài khoản</span></a>
    </li>

    @endcan
    @can('staff')
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-calendar"></i>
                <span>Đơn đặt lịch</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.bookings.index')}}">Danh sách đơn</a>
                    <a class="collapse-item" href="{{ route('admin.bookings.sortAppointment')}}">Bảng xếp lịch</a>
                </div>
            </div>
        </li>
    @endcan
    @can('admin')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBlog"
            aria-expanded="true" aria-controls="collapseBlog">
            <i class="fas fa-fw fa-bookmark"></i>
            <span>Bài viết</span>
        </a>
        <div id="collapseBlog" class="collapse" aria-labelledby="headingBlog"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.cateBlogs.index')}}">Danh mục bài viết</a>
                <a class="collapse-item" href="{{ route('admin.blogs.index')}}">Danh sách bài viết</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/contacts">
            <i class="fas fa-fw fa-phone"></i>
            <span>Liên hệ</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Giao diện
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-cog"></i>
            <span>Cài đặt</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/admin/logos">Logo</a>
                <a class="collapse-item" href="{{ route('admin.footers.index')}}">Footer</a>
                <a class="collapse-item" href="/admin/slides">Slide</a>
            </div>
        </div>
    </li>
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->