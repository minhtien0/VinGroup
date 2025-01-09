<?php

namespace App\Http\Controllers;

use App\Models\GioHang;
use App\Models\DonHang;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ThanhToanController extends Controller
{
    // Hiển thị trang thanh toán
    public function thanhtoan(Request $request)
    {
        $request->validate([
            'selected_items' => 'required|array', // Đảm bảo có ít nhất một sản phẩm được chọn
        ]);

        $user = $request->session()->get('user');

        // Lấy danh sách sản phẩm được chọn từ giỏ hàng
        $selectedItems = GioHang::with('product')
            ->where('khachhang', $user->id)
            ->whereIn('id', $request->input('selected_items'))
            ->get();

        // Tạo mã đơn hàng ngẫu nhiên
        $randomOrderCode = 'ORD-' . date('Ymd') . '-' . Str::random(5);

        // Lấy danh sách voucher của người dùng
        $vouchers = Voucher::where('trangthai', 1)
            ->whereIn('id', function ($query) use ($user) {
                $query->select('voucher')
                    ->from('kh_vc')
                    ->where('khachhang', $user->id);
            })
            ->get();

        return view('giohang.thanhtoan', compact('selectedItems', 'vouchers', 'randomOrderCode', 'user'));
    }


    // Xử lý thanh toán
    public function xuLyThanhToan(Request $request)
    {
        $request->validate([
            'selected_items' => 'required|array',
            'address' => 'required|string',
            'voucher_id' => 'nullable|exists:vouchers,id',
        ]);

        $user = $request->session()->get('user');
        $selectedItems = $request->input('selected_items');

        // Lấy thông tin sản phẩm từ giỏ hàng
        $cartItems = GioHang::where('khachhang', $user->id)
            ->whereIn('id', $selectedItems)
            ->get();

        // Tính tổng tiền
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->soluong;
        });

        // Áp dụng voucher
        if ($request->voucher_id) {
            $voucher = Voucher::find($request->voucher_id);
            $total -= $voucher->discount;
        }

        // Tạo đơn hàng
        DonHang::create([
            'madon' => 'ORD-' . date('Ymd') . '-' . Str::random(5),
            'khachhang' => $user->id,
            'sanpham' => json_encode($selectedItems),
            'soluong' => $cartItems->sum('soluong'),
            'trangthai' => 1,
            'trangthaidonhang' => 'pending',
            'ghichu' => $request->input('ghichu', ''),
            'time' => now(),
        ]);

        // Xóa sản phẩm đã thanh toán khỏi giỏ hàng
        GioHang::where('khachhang', $user->id)
            ->whereIn('id', $selectedItems)
            ->delete();

        return redirect()->route('layout.home.index')->with('success', 'Thanh toán thành công!');
    }
}