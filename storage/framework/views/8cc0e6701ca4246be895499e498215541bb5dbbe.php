<?php $__env->startSection('side-bar'); ?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/dashboard">
        <img src="/admin/img/undraw_profile.svg" alt="" width="20">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

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
                <a class="collapse-item" href="<?php echo e(Route('admin.cate_services.index')); ?>">Danh mục dịch vụ</a>
                <a class="collapse-item" href="<?php echo e(Route('admin.services.index')); ?>">Danh sách dịch vụ</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-building"></i>
            <span>Chi nhánh cửa hàng</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/admin/salons">Danh sách chi nhánh</a>
                <a class="collapse-item" href="/admin/times">Thời gian đặt lịch</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.users.index')); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Tài khoản</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/admin/bookings">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Đơn đặt lịch</span></a>
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
                <a class="collapse-item" href="register.html">Footer</a>
                <a class="collapse-item" href="/admin/slides">Slide</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar --><?php /**PATH D:\Duantotnghiep\resources\views/admin/side-bar.blade.php ENDPATH**/ ?>