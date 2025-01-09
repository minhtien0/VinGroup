<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::get('/account/voucher', [HomeController::class, 'showVoucher'])->name('account.voucher');
Route::get('/account/thongtin', [HomeController::class, 'showThongTin'])->name('account.thongtin');
Route::get('/account/donhang', [HomeController::class, 'showDonHang'])->name('account.donhang');
Route::get('/account/yeuthich', [HomeController::class, 'showYeuThich'])->name('account.yeuthich');
Route::get('/account/trangthai/{madon}', [HomeController::class, 'showTrangThai'])->name('account.trangthai');
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




