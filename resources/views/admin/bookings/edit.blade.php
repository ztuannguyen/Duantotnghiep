@extends('layouts.admin')
@section('title')
    Sửa thông tin đơn đặt lịch
@endsection
@section('contents')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Đặt lịch</li>
        <li class="breadcrumb-item"><a href="{{ route('admin.bookings.index') }}">Danh sách đơn đặt lịch</a> </li>
        <li class="breadcrumb-item">Sửa thông tin đơn đặt lịch</li>
    </ol>
</nav>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm mới đơn đặt lịch</h6>
    </div>
</div>
@endsection