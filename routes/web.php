<?php

use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\BookingController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ServiceController;
use App\Http\Controllers\Client\AuthController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Client
Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->role_id == 1) {
            return redirect()->route('admin.bookings.index');
        } elseif (Auth::user()->role_id == 3) {
            return redirect()->route('client.home');
        } else {
            return redirect()->route('admin.dashboard');
        }
    } else {
        return redirect()->route('client.show');
    }
});
Route::group(['middleware' => 'verify.customer'], function () {
    Route::get('/dat-lich',[BookingController::class,'show'])->name('client.show');
    Route::post('/client/get-time-of-salon',[BookingController::class,'getTimeOfSalon'])->name('client.get-time-of-salon');
    Route::post('/',[BookingController::class, 'store'])->name('client.post');
    Route::get('/',[HomeController::class,'show'])->name('client.home');


    //Dịch vụ 
    Route::get('/dich-vu',[ServiceController::class,'service'])->name('client.service');
    Route::get('/chi-tiet-dich-vu/{id}',[ServiceController::class,'detail'])->name('client.detailService');
    //Bài viết
    Route::get('/trang-bai-viet',[BlogController::class,'list'])->name('client.blog');
    Route::get('danh-muc-bai-viet/{id}',[BlogController::class,'category'])->name('category');
    Route::get('/chi-tiet-bai-viet/{id}',[BlogController::class,'detail'])->name('client.detailBlog');
    Route::get('/tim-kiem-bai-viet',[BlogController::class,'search'])->name('search');

    Route::get('/trang-lien-he', [ContactController::class, 'contact'])->name('client.contact');
    Route::post('/trang-lien-he', [ContactController::class, 'postContact'])->name('client.postContact');

    Route::get('/trang-gioi-thieu', function() {
        return view('client/about');
    })->name('client.about');


    // Đăng nhập, khôi phục mật khẩu
    Route::get('/dang-nhap',[AuthController::class,'login'])->name('client.login');
    Route::get('/khoi-phuc-mat-khau',[AuthController::class,'resetPassword'])->name('client.resetPassword');
    Route::get('/continue_second',[AuthController::class,'continueSecond']);
    Route::get('/resend',[AuthController::class,'resendOTP']);
    Route::get('/continue_third',[AuthController::class,'continueThird']);
    Route::post('/dang-nhap',[AuthController::class,'postLogin'])->name('client.postLogin');
    Route::post('/khoi-phuc-mat-khau',[AuthController::class,'postReset'])->name('client.postReset');
    Route::get('/dang-xuat',[AuthController::class,'logout'])->name('client.logout');
    Route::get('/login',[AuthController::class,'ajaxLogin']);
});