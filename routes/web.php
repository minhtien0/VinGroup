<?php
use App\Http\Controllers\adminController;
use App\Http\Controllers\DongController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\QuocController;
use App\Http\Controllers\LienHeController;
use App\Http\Controllers\GioHangController;
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

///Quoc
Route::get('/giohang/giohang', [GioHangController::class, 'giohang'])->name('giohang.giohang');
Route::post('/dangnhap/Login', [QuocController::class, 'Login'])->name('dangnhap.Login.post');
Route::get('/dangnhap/Login', [QuocController::class, 'Logingiohang'])->name('dangnhap.Login');
Route::post('/logout', [QuocController::class, 'logout'])->name('logout');

Route::get('/Layouts/index', [QuocController::class, 'index'])->name('Layouts.index');
Route::get('/lienhe/khlienhe', [LienHeController::class, 'khlienhe'])->name('lienhe.khlienhe');
Route::get('/lienhe/blog', [BlogController::class, 'blog'])->name('lienhe.blog');
// Route hiển thị form đăng ký
Route::post('/dangnhap/dangky', [QuocController::class, 'dangky'])->name('dangnhap.dangky');

Route::post('/giohang/update/{id}', [GioHangController::class, 'update'])->name('giohang.update');

Route::post('/giohang/remove/{id}', [GioHangController::class, 'removeProduct'])->name('giohang.remove');
Route::post('/giohang/clear', [GioHangController::class, 'clearCart'])->name('giohang.clear');

Route::get('/featured-products/{categoryId}', [BlogController::class, 'getFeaturedProducts']);

//admin
Route::get('/lienhe/admin', [adminController::class, 'admin'])->name('lienhe.admin');



