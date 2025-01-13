<?php

namespace App\Http\Controllers;

use App\Models\DonHang; // Import model DonHang
use App\Models\GioHang;
use App\Models\User;
use App\Models\Voucher;
use App\Models\product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThanhToanController extends Controller
{
    // 1. Hiển thị trang thanh toán (GET)
    public function showThanhToan(Request $request)
    {
        // Lấy dữ liệu từ session
        $selectedItemsIds = $request->session()->get('selected_items', []);
        $randomOrderCode = $request->session()->get('randomOrderCode', 'KH' . Str::random(5));
        $user = $request->session()->get('user');

        // Kiểm tra nếu người dùng chưa đăng nhập
        if (!$user) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

        // Lấy danh sách sản phẩm được chọn từ giỏ hàng
        $selectedItems = GioHang::with('product')
            ->where('khachhang', $user->id)
            ->whereIn('id', $selectedItemsIds)
            ->get();

        // Lấy danh sách voucher của người dùng
        $vouchers = Voucher::where('trangthai', 1)
            ->whereIn('id', function ($query) use ($user) {
                $query->select('voucher')
                    ->from('kh_vc')
                    ->where('khachhang', $user->id);
            })
            ->get();

        return view('giohang.thanhtoan', compact('randomOrderCode', 'selectedItems', 'vouchers', 'user'));
    }

    // 2. Xử lý dữ liệu từ giỏ hàng và chuyển hướng tới trang thanh toán (POST)
    public function thanhtoan(Request $request)
    {
        // Kiểm tra dữ liệu gửi từ form giỏ hàng
        $request->validate([
            'selected_items' => 'required|array', // Đảm bảo có ít nhất một sản phẩm được chọn
        ]);

        $user = $request->session()->get('user');

        // Lấy danh sách sản phẩm được chọn từ giỏ hàng
        $selectedItems = GioHang::with('product')
            ->where('khachhang', $user->id)
            ->whereIn('id', $request->input('selected_items'))
            ->get();

        if ($selectedItems->isEmpty()) {
            return redirect()->back()->with('error', 'Không có sản phẩm nào được chọn.');
        }

        // Tạo mã đơn hàng ngẫu nhiên
        $randomOrderCode = 'KH' . Str::random(5);

        // Lưu thông tin vào session để hiển thị trên trang thanh toán
        $request->session()->put('selected_items', $request->input('selected_items'));
        $request->session()->put('randomOrderCode', $randomOrderCode);

        return redirect()->route('showthanhtoan');
    }

    // 3. Xử lý thanh toán (POST)
    public function xuLyThanhToan(Request $request)
    {
        $request->validate([
            'randomOrderCode' => 'required|string',
            'address' => 'required|string|max:255',
            'voucher_id' => 'nullable|exists:vouchers,id',
        ]);

        // Lấy thông tin người dùng
        $user = $request->session()->get('user');

        // Lấy danh sách sản phẩm đã chọn từ session
        $selectedItems = GioHang::with('product')
            ->whereIn('id', $request->session()->get('selected_items', []))
            ->where('khachhang', $user->id)
            ->get();

        if ($selectedItems->isEmpty()) {
            return redirect()->back()->with('error', 'Không có sản phẩm nào được chọn.');
        }

        // Tính tổng tiền
        $totalPrice = $selectedItems->sum(function ($item) {
            return $item->product->price * $item->soluong;
        });

        // Áp dụng voucher nếu có
        if ($request->voucher_id) {
            $voucher = Voucher::find($request->voucher_id);
            if ($voucher) {
                $totalPrice -= $voucher->discount;
                $totalPrice = max($totalPrice, 0); // Đảm bảo tổng tiền không âm
            }
        }

        // Lấy mã đơn hàng từ session
        $randomOrderCode = $request->input('randomOrderCode');

        $firstItem = $selectedItems->first();

        // Tạo đơn hàng mới
        $donHang = DonHang::create([
            'madon' => $randomOrderCode,
            'khachhang' => $user->id,
            'trangthai' => '1', // Pending
            'trangthaidonhang' => 'Chờ Thanh Toán',
            'ghichu' => $request->input('ghichu', ''),
            'time' => now(),
        ]);
        // Thêm từng sản phẩm vào bảng `dh_sp`
        foreach ($selectedItems as $item) {
            DB::table('dh_sp')->insert([
                'id_donhang' => $donHang->id, // ID đơn hàng vừa tạo
                'sanpham' => $item->product->id, // ID sản phẩm
                'soluong' => $item->soluong, // Số lượng sản phẩm
            ]);
        }

        // Xóa các sản phẩm đã thanh toán khỏi giỏ hàng
        GioHang::whereIn('id', $selectedItems->pluck('id'))->delete();

        return redirect()->route('giohang.giohang')->with('success', 'Thanh toán thành công!');
    }
}

