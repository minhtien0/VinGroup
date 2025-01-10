<?php

namespace App\Http\Controllers;
use App\Models\GioHang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GioHangController extends Controller
{
    //
    public function giohang(Request $request)
    {
        // Kiểm tra nếu người dùng chưa đăng nhập
        $user = $request->session()->get('user');
        if (!$user) {
            return redirect()->route('home.index')->with('error', 'Vui lòng đăng nhập để xem giỏ hàng.');
        }
        $cartItems = GioHang::with('product')->where('khachhang', $user->id)->paginate(5);
        // Tính tổng tiền
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->product->price * $item->soluong;
        });

        return view('giohang.giohang', compact('cartItems', 'totalPrice'));
    }
    public function update(Request $request, $id)
{
    // Tìm sản phẩm trong giỏ hàng dựa trên id
    $cartItem = GioHang::find($id);
    // Xử lý tăng hoặc giảm số lượng
    $newQuantity = $cartItem->soluong;
    if ($request->action === 'increase') {
        $newQuantity++; // Tăng số lượng
    } elseif ($request->action === 'decrease') {
        if ($newQuantity > 1) {
            $newQuantity--; // Giảm số lượng
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Số lượng không thể nhỏ hơn 1.',
            ], 400);
        }
    }

    // Cập nhật số lượng
    $cartItem->soluong = $newQuantity;
    $cartItem->save();
    return response()->json([
        'success' => true,
        'newQuantity' => $newQuantity,
        'message' => 'Cập nhật số lượng thành công',
    ]);
}

    public function removeProduct($id)
    {
        GioHang::destroy($id);
        return response()->json(['success' => true, 'message' => 'Xóa sản phẩm thành công']);
    }

    public function clearCart(Request $request)
    {
        $userId = $request->session()->get('user')->id ?? null;
        
        GioHang::where('khachhang',$userId)->delete();
        return response()->json(['success' => true, 'message' => 'Đã xóa tất cả sản phẩm trong giỏ hàng']);
    }
}