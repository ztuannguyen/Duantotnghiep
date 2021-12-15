<?php

use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\BookingController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ServiceController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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


Route::get('/',[HomeController::class,'show'])->name('client.home');
// Booking
Route::get('/dat-lich',[BookingController::class,'show'])->name('client.show');
Route::post('/client/get-time-of-salon',[BookingController::class,'getTimeOfSalon'])->name('client.get-time-of-salon');
Route::post('/',[BookingController::class, 'store'])->name('client.post');

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