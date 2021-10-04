<?php

use App\Http\Controllers\Admin\CateServiceController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SalonController;
use App\Http\Controllers\Admin\SalonTimeController;
use App\Http\Controllers\Admin\BookingController;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('welcome');
});
// User
Route::get('/client/booking',[ClientController::class,'index'])->name('client.booking');
// Admin dashbord
Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');


//--------------------------SALONS--------------------//
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin'
], function () {
    Route::group([
        'prefix' => "salons",
        'as' => "salons."
    ], function () {
        Route::get('/', [SalonController::class,'index'])->name('index');
        Route::get('/create', [SalonController::class,'create'])->name('create');
        Route::post('/store', [SalonController::class,'store'])->name('store');
        Route::get('/edit/{salon}', [SalonController::class,'edit'])->name('edit');
        Route::post('/update/{salon}', [SalonController::class,'update'])->name('update');
        Route::post('/delete/{salon}', [SalonController::class,'delete'])->name('delete');
    });
});
//-------------------------TIME SALONS----------------------//
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin'
], function () {
    Route::group([
        'prefix' => "times",
        'as' => "times."
    ], function () {
        Route::get('/', [SalonTimeController::class,'index'])->name('index');
        Route::get('/create', [SalonTimeController::class,'create'])->name('create');
        Route::post('/store', [SalonTimeControlle::class,'store'])->name('store');
        Route::get('/edit/{time}', [SalonTimeController::class,'edit'])->name('edit');
        Route::post('/update/{time}', [SalonTimeController::class,'update'])->name('update');
        Route::post('/delete/{time}', [SalonTimeController::class,'delete'])->name('delete');
    });
});
//--------------------------BOOKINGS--------------------//
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin'
], function () {
    Route::group([
        'prefix' => "bookings",
        'as' => "bookings."
    ], function () {
        Route::get('/', [BookingController::class,'index'])->name('index');
        Route::get('/create', [BookingController::class,'create'])->name('create');
        Route::post('/store', [BookingController::class,'store'])->name('store');
        // Route::get('/edit/{salon}', [SalonController::class,'edit'])->name('edit');
        // Route::post('/update/{salon}', [SalonController::class,'update'])->name('update');
        Route::post('/delete/{booking}', [BookingController::class,'delete'])->name('delete');
    });
});
// Cate Service
Route::get('/admin/cate_services', [CateServiceController::class, 'index'])->name('admin.cate_services.index');
Route::get('/cate_services/delete/{id}', [CateServiceController::class, 'delete'])->name('admin.cate_services.delete');
Route::get('/cate_services/create', [CateServiceController::class, 'create'])->name('admin.cate_services.create');
Route::post('/cate_services/store', [CateServiceController::class, 'store'])->name('admin.cate_services.store');
Route::get('/cate_services/edit/{cateService}', [CateServiceController::class, 'edit'])->name('admin.cate_services.edit');
Route::post('/cate_services/update/{cateService}', [CateServiceController::class, 'update'])->name('admin.cate_services.update');

// Service
Route::get('/admin/services', [ServiceController::class, 'index'])->name('admin.services.index');
Route::get('services/delete/{service}', [ServiceController::class, 'delete'])->name('admin.services.delete');
Route::get('/admin/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
Route::post('/admin/services/store', [ServiceController::class, 'store'])->name('admin.services.store');
Route::get('/admin/services/edit/{service}', [ServiceController::class, 'edit'])->name('admin.services.edit');
Route::post('/admin/services/update/{service}', [ServiceController::class, 'update'])->name('admin.services.update');

