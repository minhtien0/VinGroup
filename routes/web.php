<?php
use App\Http\Controllers\adminController;
use App\Http\Controllers\DongController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\QuocController;
use App\Http\Controllers\LienHeController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ThanhToanController;

//tien
Route::get('/account/voucher', [HomeController::class, 'showVoucher'])->name('account.voucher');
Route::get('/account/thongtin', [HomeController::class, 'showThongTin'])->name('account.thongtin');
Route::get('/account/donhang', [HomeController::class, 'showDonHang'])->name('account.donhang');
Route::get('/account/yeuthich', [HomeController::class, 'showYeuThich'])->name('account.yeuthich');
Route::get('/account/trangthai/{madon}', [HomeController::class, 'showTrangThai'])->name('account.trangthai');
Route::get('/account', [HomeController::class, 'showDonHang'])->name('account.donhang');

/* Route::get('/', [HomeController::class, 'test'])->name('home.test'); */

//login
Route::get('/login', function () {
    return view('home.taikhoan.login');
})->name('home.login.form');

Route::post('/login', [HomeController::class, 'login'])->name('home.login');

/* Route::get('/home/test', [HomeController::class, 'test'])->name('home.test'); */

//logout
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');

Route::get('/home/test', [HomeController::class, 'test'])->name('home.test');


//thay đổi thông tin ng dùng
Route::get('/infouser/{id}', [HomeController::class, 'infouser'])->name('account.infouser');
Route::post('/UpdateInfoUser/{id}', [HomeController::class, 'UpdateInfoUser'])->name('account.UpdateInfoUser');

//test chi tiết
Route::get('/chitiet/{slug}/{id}', [HomeController::class, 'detail'])->name('home.detail');

//comment 
Route::post('/rates/add', [HomeController::class, 'AddRates'])->name('rates.add');
//yeuthich
Route::post('/favorite/add', [HomeController::class, 'AddFavorite'])->name('favorite.add');
//giỏ hàng
Route::post('/giohang/add', [HomeController::class, 'AddGioHang'])->name('giohang.add');
//dong
Route::get('/', [DongController::class, 'index'])->name('home.index');
Route::get('/admin/dashboard', [DongController::class, 'dashboard'])->name('home.admin.dashboard');

route::get('/policy', [DongController::class,'Policy'])->name('layouts.home.policy'); 

Route::get('/search-ajax', [DongController::class, 'searchAjax'])->name('product.searchAjax');
Route::get('/san-pham/{slug}', [DongController::class, 'detail'])->name('home.product.detail');

///Quoc/////////////////////////////////////////////
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
/////////////////////////////////////////

// Route để hiển thị trang thanh toán (GET)
Route::get('/thanhtoan', [ThanhToanController::class, 'showThanhToan'])->name('showthanhtoan');

// Route để xử lý dữ liệu từ giỏ hàng và chuyển hướng tới trang thanh toán (POST)
Route::post('/thanhtoan', [ThanhToanController::class, 'thanhtoan'])->name('thanhtoan');

// Route để hoàn tất xử lý thanh toán (POST)
Route::post('/xulythanhtoan', [ThanhToanController::class, 'xuLyThanhToan'])->name('xulythanhtoan');

// Route để xóa toàn bộ giỏ hàng (AJAX)
Route::post('/clear-cart', [ThanhToanController::class, 'clearCart'])->name('clearCart');

// Route để cập nhật số lượng sản phẩm trong giỏ hàng (AJAX)
Route::post('/update-cart/{id}', [ThanhToanController::class, 'updateCart'])->name('updateCart');

// Route để xóa một sản phẩm khỏi giỏ hàng (AJAX)
Route::post('/remove-from-cart/{id}', [ThanhToanController::class, 'removeFromCart'])->name('removeFromCart');

//////////
/* Route::get('/categories/{slug}', [DongController::class, 'getCategoryName'])->name('categories.name');
Route::get('/category/{slug}', [DongController::class, 'showCategory'])->name('category.show'); */

Route::get('/categories/{name}', [DongController::class, 'getCategoryName'])->name('categories.name');
Route::get('/category/{name}', [DongController::class, 'showCategory'])->name('category.show');
Route::post('/get-child-categories', [DongController::class, 'getChildCategories'])->name('getChildCategories');

Route::get('/categori', [DongController::class, 'showIphoneCategory'])->name('iphone');


//admin thach////////////////////////////////////////////////////
Route::get('/lienhe/admin', [adminController::class, 'admin'])->name('lienhe.admin');


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
//comment
// Danh sách bình luận
Route::get('admin/comments', [CommentController::class, 'index'])->name('comments.index');
// Xoá bình luận
Route::delete('admin/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

