<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SalonController;
use App\Http\Controllers\Admin\SalonTimeController;
use App\Http\Controllers\Client\ClientController;

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
Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
Route::get('/client/booking',[ClientController::class,'index'])->name('client.booking');
// Route::get('/danh-muc/{id}',[ClientController::class,'salon'])->name('cate-salon');

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
        Route::post('/delete/{time}',[SalonTimeController::class,'delete'])->name('delete');
    });
});