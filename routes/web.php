<?php

use App\Http\Controllers\Admin\CateServiceController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Client\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SalonController;
use App\Http\Controllers\Admin\SalonTimeController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\ContactController;
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
Route::get('/client/booking',[ClientController::class,'show'])->name('client.show');
Route::post('/client/get-time-of-salon',[ClientController::class,'getTimeOfSalon'])->name('client.get-time-of-salon');
Route::post('/',[ClientController::class, 'store'])->name('client.post');
// Admin dashboard
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
        Route::post('/store', [SalonTimeController::class,'store'])->name('store');
        Route::get('/edit/{time}', [SalonTimeController::class,'edit'])->name('edit');
        Route::post('/update/{time}', [SalonTimeController::class,'update'])->name('update');
        Route::post('/delete/{time}', [SalonTimeController::class,'delete'])->name('delete');
    });
});
///bookings
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
        Route::get('/edit/{booking}', [BookingController::class,'edit'])->name('edit');
        Route::post('/update/{booking}', [BookingController::class,'update'])->name('update');
        Route::post('/delete/{booking}', [BookingController::class,'remove'])->name('remove');
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

//users

Route::get('/admin/users', [UserController::class,'index'])->name('admin.users.index');
Route::get('/admin/user/delete/{id}', [UserController::class, 'remove'])->name('admin.users.remove');
Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
Route::post('/admin/users/store', [UserController::class, 'store'])->name('admin.users.store');
Route::get('/admin/users/edit/{user}', [UserController::class, 'edit'])->name('admin.users.edit');
Route::post('/admin/users/update/{user}', [UserController::class, 'update'])->name('admin.users.update');

//--------------------------LOGO--------------------//
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin'
], function () {
    Route::group([
        'prefix' => "logos",
        'as' => "logos."
    ], function () {
        Route::get('/', [LogoController::class,'index'])->name('index');
        Route::get('/create', [LogoController::class,'create'])->name('create');
        Route::post('/store', [LogoController::class,'store'])->name('store');
        Route::get('/edit/{logo}', [LogoController::class,'edit'])->name('edit');
        Route::post('/update/{logo}', [LogoController::class,'update'])->name('update');
        Route::post('/delete/{logo}', [LogoController::class,'delete'])->name('delete');
    });
});
//--------------------------CONTACT--------------------//
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin'
], function () {
    Route::group([
        'prefix' => "contacts",
        'as' => "contacts."
    ], function () {
        Route::get('/', [ContactController::class,'index'])->name('index');
        Route::get('/create', [ContactController::class,'create'])->name('create');
        Route::post('/store', [ContactController::class,'store'])->name('store');
        Route::get('/edit/{contact}', [ContactController::class,'edit'])->name('edit');
        Route::post('/update/{contact}', [ContactController::class,'update'])->name('update');
        Route::post('/delete/{contact}', [ContactController::class,'delete'])->name('delete');
    });
});

//slides
Route::get('/admin/slides', [SlideController::class, 'index'])->name('admin.slides.index');
Route::get('/admin/slides/create', [SlideController::class, 'create'])->name('admin.slides.create');
Route::post('/admin/slides/store', [SlideController::class, 'store'])->name('admin.slides.store');
Route::get('/admin/slides/edit/{slide}', [SlideController::class, 'edit'])->name('admin.slides.edit');
Route::post('/admin/slides/update/{slide}', [SlideController::class, 'update'])->name('admin.slides.update');
Route::get('/admin/slides/delete/{slide}', [SlideController::class, 'delete'])->name('admin.slides.delete');

