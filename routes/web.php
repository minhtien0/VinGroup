<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

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

//comment
// Danh sách bình luận
Route::get('admin/comments', [CommentController::class, 'index'])->name('comments.index');
// Xoá bình luận
Route::delete('admin/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');


//lienhe
Route::get('admin/lienhe', [LienHeController::class, 'index'])->name('lienhe.index');
Route::put('admin/lienhe/{id}', [LienHeController::class, 'update'])->name('lienhe.update');
Route::delete('admin/lienhe/{id}', [LienHeController::class, 'destroy'])->name('lienhe.destroy');

//product
// Danh sách sản phẩm + tìm kiếm
Route::get('admin/products', [ProductController::class, 'index'])->name('products.index');

// Form thêm
Route::get('admin/products/create', [ProductController::class, 'create'])->name('products.create');
// Lưu
Route::post('admin/products', [ProductController::class, 'store'])->name('products.store');

// Form sửa
Route::get('admin/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
// Cập nhật
Route::put('admin/products/{id}', [ProductController::class, 'update'])->name('products.update');

// Xóa
Route::delete('admin/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');


