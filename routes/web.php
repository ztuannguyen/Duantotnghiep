<?php

use App\Http\Controllers\Admin\CateServiceController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
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