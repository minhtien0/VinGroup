<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

Route::get('/account/voucher', [HomeController::class, 'showVoucher'])->name('account.voucher');
Route::get('/account/thongtin', [HomeController::class, 'showThongTin'])->name('account.thongtin');
Route::get('/account/donhang', [HomeController::class, 'showDonHang'])->name('account.donhang');
Route::get('/account/yeuthich', [HomeController::class, 'showYeuThich'])->name('account.yeuthich');
Route::get('/account', [HomeController::class, 'showDonHang'])->name('account.donhang');

Route::get('/', [HomeController::class, 'test'])->name('home.test');

//login
Route::get('/login', function () {
    return view('home.taikhoan.login');
})->name('home.login.form');

Route::post('/login', [HomeController::class, 'login'])->name('home.login');
//logout
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');

Route::get('/home/test', [HomeController::class, 'test'])->name('home.test');

//thay đổi thông tin ng dùng
Route::get('/infouser/{id}', [HomeController::class, 'infouser'])->name('account.infouser');
Route::post('/UpdateInfoUser/{id}', [HomeController::class, 'UpdateInfoUser'])->name('account.UpdateInfoUser');

//test chi tiết
Route::get('/chitiet/{id}', [HomeController::class, 'detail'])->name('home.detail');

//comment 
Route::post('/rates/add', [HomeController::class, 'AddRates'])->name('rates.add');
//yeuthich
Route::post('/favorite/add', [HomeController::class, 'AddFavorite'])->name('favorite.add');
//danhmuc
Route::get('/admin/danhmuc/category/search', [CategoryController::class, 'search'])->name('admin.danhmuc.category.search');
Route::get('/admin/danhmuc/category', [CategoryController::class, 'category'])->name('admin.danhmuc.category');
Route::get('/admin/danhmuc/addcategory',[CategoryController::class,'add'])->name('admin.danhmuc.addcategory');
Route::get('/admin/danhmuc/category/{id}/edit', [CategoryController::class, 'edit'])->name('admin.danhmuc.category.edit');
Route::post('/admin/danhmuc/store', [CategoryController::class, 'storeAjax'])->name('admin.danhmuc.store.ajax');
Route::delete('admin/danhmuc/category/{id}',[CategoryController::class, 'destroy'])->name('admin.danhmuc.category.destroy');
Route::put('/admin/danhmuc/category/{id}',[CategoryController::class,'update'])->name('admin.danhmuc.update');
Route::get('/admin/danhmuc/addcategory', [CategoryController::class, 'create'])->name('admin.danhmuc.addcategory');
//donhang
Route::get('/admin/donhang/orders', [AdminController::class, 'orders'])->name('admin.donhang.orders');
Route::get('/admin/donhang/editorders/{id}', [OrderController::class, 'edit'])->name('admin.donhang.orders.edit');
Route::get('/admin/donhang/orders/{id}/edit', [OrderController::class, 'edit'])->name('admin.donhang.edit');
Route::put('/admin/donhang/{id}', [OrderController::class, 'update'])->name('admin.donhang.update');
Route::delete('admin/donhang/orders/{id}',[OrderController::class,'destroy'])->name('admin.donhang.orders.destroy');
Route::get('/admin/donhang/orders', [OrderController::class, 'index'])->name('admin.donhang.orders');
//DashBoard
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');



