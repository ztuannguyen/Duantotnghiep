<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CateServiceController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SalonController;
use App\Http\Controllers\Admin\SalonTimeController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ChairController;
use App\Http\Controllers\Admin\BlogCateController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\SortAppointmentController;
use App\Http\Controllers\CancelBookingController;
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


// Admin dashboard
Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

//--------------------------Cửa hàng--------------------//
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
        Route::get('/edit/{id}', [SalonController::class,'edit'])->name('edit');
        Route::post('/update/{id}', [SalonController::class,'update'])->name('update');
        Route::post('/delete/{salon}', [SalonController::class,'delete'])->name('delete');
        Route::get('/thay-doi-trang-thai/{id}/{status}',[SalonController::class, 'status'])->name('statusSalon');
    });
});
Route::get('/thay-doi-trang-thai/{id}/{status}',[SalonController::class, 'status'])->name('statusSalon');

//-------------------------Thời gian----------------------//
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

//--------------------------Đặt lịch--------------------//
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
        Route::get('/edit/{id}', [BookingController::class,'edit'])->name('edit');
        Route::post('/update/{id}', [BookingController::class,'update'])->name('update');
        Route::post('/delete/{booking}', [BookingController::class,'remove'])->name('remove');
        
        Route::get('/sortAppointment',[SortAppointmentController::class,'index'])->name('sortAppointment');
        Route::post('/sortAppointment', [SortAppointmentController::class, 'post'])->name('admin.bookings.sortAppointment');
        Route::post('/chi-tiet-don-dat-lich',[BookingController::class,'detailAppointment'])->name('detailAppointment');
        Route::get('/waitingCut',[BookingController::class,'waitingCut'])->name('waitingCut');
        Route::post('/save-waiting',[BookingController::class,'saveWaiting'])->name('saveWaiting');
        Route::post('/save-waiting-schedule', [BookingController::class, 'saveWaitingSchedule'])->name('saveWaitingSchedule');
        Route::get('/xuat-hoa-don/{id}', [BookingController::class, 'invoices'])->name('invoices');
        Route::resource('/booking_services','SortAppointmentController');
    });
});

//--------------------------Danh mục dịch vụ--------------------//

Route::get('/admin/cate_services', [CateServiceController::class, 'index'])->name('admin.cate_services.index');
Route::get('/cate_services/delete/{id}', [CateServiceController::class, 'delete'])->name('admin.cate_services.delete');
Route::get('/cate_services/create', [CateServiceController::class, 'create'])->name('admin.cate_services.create');
Route::post('/cate_services/store', [CateServiceController::class, 'store'])->name('admin.cate_services.store');
Route::get('/cate_services/edit/{cateService}', [CateServiceController::class, 'edit'])->name('admin.cate_services.edit');
Route::post('/cate_services/update/{cateService}', [CateServiceController::class, 'update'])->name('admin.cate_services.update');
Route::get('/admin/cate_services/thay-doi-trang-thai/{id}/{status}',[CateServiceController::class, 'status'])->name('statusCate');

//--------------------------Dịch vụ-------------------//

Route::get('/admin/services', [ServiceController::class, 'index'])->name('admin.services.index');
Route::get('services/delete/{service}', [ServiceController::class, 'delete'])->name('admin.services.delete');
Route::get('/admin/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
Route::post('/admin/services/store', [ServiceController::class, 'store'])->name('admin.services.store');
Route::get('/admin/services/edit/{service}', [ServiceController::class, 'edit'])->name('admin.services.edit');
Route::post('/admin/services/update/{service}', [ServiceController::class, 'update'])->name('admin.services.update');
Route::get('/admin/services/thay-doi-trang-thai/{id}/{status}',[ServiceController::class, 'status'])->name('statusService');

//--------------------------User--------------------//

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
        Route::get('/thay-doi-trang-thai/{id}/{status}', [LogoController::class,'status'])->name('statusLogo');
        Route::get('/edit/{logo}', [LogoController::class,'edit'])->name('edit');
        Route::post('/update/{logo}', [LogoController::class,'update'])->name('update');
        Route::post('/delete/{logo}', [LogoController::class,'delete'])->name('delete');
        
    });
});
//--------------------------Liên Hệ--------------------//
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
        Route::get('/thay-doi-trang-thai/{id}/{status}', [ContactController::class,'status'])->name('statusContact');
        Route::get('/edit/{contact}', [ContactController::class,'edit'])->name('edit');
        Route::post('/update/{contact}', [ContactController::class,'update'])->name('update');
        Route::post('/delete/{contact}', [ContactController::class,'delete'])->name('delete');
    });
});

//--------------------------Slide--------------------//

Route::get('/admin/slides', [SlideController::class, 'index'])->name('admin.slides.index');
Route::get('/admin/slides/create', [SlideController::class, 'create'])->name('admin.slides.create');
Route::post('/admin/slides/store', [SlideController::class, 'store'])->name('admin.slides.store');
Route::get('/admin/slides/edit/{slide}', [SlideController::class, 'edit'])->name('admin.slides.edit');
Route::post('/admin/slides/update/{slide}', [SlideController::class, 'update'])->name('admin.slides.update');
Route::get('/admin/slides/delete/{slide}', [SlideController::class, 'delete'])->name('admin.slides.delete');
Route::get('/admin/slides/thay-doi-trang-thai/{id}/{status}',[SlideController::class, 'status'])->name('statusSlide');

//--------------------------Ghế làm--------------------//

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin'
], function () {
    Route::group([
        'prefix' => "chairs",
        'as' => "chairs."
    ], function () {
        Route::get('/', [ChairController::class,'index'])->name('index');
        Route::get('/create', [ChairController::class,'create'])->name('create');
        Route::post('/store', [ChairController::class,'store'])->name('store');
        Route::get('/edit/{chair}', [ChairController::class,'edit'])->name('edit');
        Route::post('/update/{chair}', [ChairController::class,'update'])->name('update');
        Route::post('/delete/{chair}', [ChairController::class,'delete'])->name('delete');
        Route::get('/thay-doi-trang-thai/{id}/{status}',[ChairController::class, 'status'])->name('statusChair');
    });
});

//--------------------------Danh mục bài biết--------------------//

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin'
], function () {
    Route::group([
        'prefix' => "cateBlogs",
        'as' => "cateBlogs."
    ], function () {
        Route::get('/', [BlogCateController::class,'index'])->name('index');
        Route::get('/create', [BlogCateController::class,'create'])->name('create');
        Route::post('/store', [BlogCateController::class,'store'])->name('store');
        Route::get('/edit/{blogCate}', [BlogCateController::class,'edit'])->name('edit');
        Route::post('/update/{blogCate}', [BlogCateController::class,'update'])->name('update');
        Route::post('/delete/{blogCate}', [BlogCateController::class,'delete'])->name('delete');
        Route::get('/thay-doi-trang-thai/{id}/{status}',[BlogCateController::class, 'status'])->name('statusCateBlog');
    });
});

//--------------------------Bài biết--------------------//

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin'
], function () {
    Route::group([
        'prefix' => "blogs",
        'as' => "blogs."
    ], function () {
        Route::get('/', [BlogController::class,'index'])->name('index');
        Route::get('/create', [BlogController::class,'create'])->name('create');
        Route::post('/store', [BlogController::class,'store'])->name('store');
        Route::get('/edit/{blog}', [BlogController::class,'edit'])->name('edit');
        Route::post('/update/{blog}', [BlogController::class,'update'])->name('update');
        Route::post('/delete/{blog}', [BlogController::class,'delete'])->name('delete');
        Route::get('/thay-doi-trang-thai/{id}/{status}',[BlogController::class, 'status'])->name('statusBlog');
    });
});

Route::get('/admin/footers', [FooterController::class, 'index'])->name('admin.footers.index');
Route::post('/admin/footers/delete/{footer}', [FooterController::class, 'delete'])->name('admin.footers.delete');
Route::get('/admin/footers/create', [FooterController::class, 'create'])->name('admin.footers.create');
Route::get('/admin/footers/edit/{footer}', [FooterController::class, 'edit'])->name('admin.footers.edit');
Route::post('/admin/footers/store', [FooterController::class, 'store'])->name('admin.footers.store');
Route::post('/admin/footers/update/{footer}', [FooterController::class, 'update'])->name('admin.footers.update');


Route::get('/admin/cancelBooking/index', [CancelBookingController::class, 'index'])->name('admin.cancelBooking.index');
Route::post('/admin/cancelBooking', [CancelBookingController::class, 'cancelBooking'])->name('admin.cancelBooking');