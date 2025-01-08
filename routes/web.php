<?php
use App\Http\Controllers\DongController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
//tien
Route::get('/account/voucher', [HomeController::class, 'showVoucher'])->name('account.voucher');
Route::get('/account/thongtin', [HomeController::class, 'showThongTin'])->name('account.thongtin');
Route::get('/account/donhang', [HomeController::class, 'showDonHang'])->name('account.donhang');
Route::get('/account', [HomeController::class, 'showDonHang'])->name('account.donhang');

/* Route::get('/', [HomeController::class, 'test'])->name('home.test'); */


Route::get('/login', function () {
    return view('home.taikhoan.login');
})->name('home.login.form');

Route::post('/login', [HomeController::class, 'login'])->name('home.login');
/* Route::get('/home/test', [HomeController::class, 'test'])->name('home.test'); */

Route::get('/infouser/{id}', [HomeController::class, 'infouser'])->name('account.infouser');
Route::post('/UpdateInfoUser/{id}', [HomeController::class, 'UpdateInfoUser'])->name('account.UpdateInfoUser');

//test chi tiết
Route::get('/chitiet/{id}', [HomeController::class, 'detail'])->name('home.detail');

//comment 
Route::post('/rates/add', [HomeController::class, 'AddRates'])->name('rates.add');


//dong
Route::get('/', [DongController::class, 'index'])->name('home.index');
Route::get('/admin/dashboard', [DongController::class, 'dashboard'])->name('home.admin.dashboard');

route::get('/policy', [DongController::class,'Policy'])->name('layouts.home.policy'); 

Route::get('/search-ajax', [DongController::class, 'searchAjax'])->name('product.searchAjax');
Route::get('/san-pham/{slug}', [DongController::class, 'detail'])->name('home.product.detail');


Route::get('/categories/{slug}', [DongController::class, 'getCategoryName'])->name('categories.name');
Route::get('/category/{slug}', [DongController::class, 'showCategory'])->name('category.show');

