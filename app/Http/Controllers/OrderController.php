<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('donhang');

        // Bộ lọc theo trạng thái thanh toán
        if ($request->filled('trangthai')) {
            $query->where('trangthai', $request->trangthai);
        }

        // Bộ lọc theo trạng thái đơn hàng
        if ($request->filled('trangthaidonhang')) {
            $query->where('trangthaidonhang', $request->trangthaidonhang);
        }
        // Bộ lọc theo ngày tạo đơn (chỉ hiển thị đơn hàng có ngày tạo bằng ngày đã chọn)
        if ($request->filled('selected_date')) {
            $query->whereDate('time', '=', $request->selected_date); // Lọc chính xác theo ngày
        }

        // Lấy danh sách đơn hàng
        $orders = $query->get();

        return view('admin.donhang.orders', compact('orders'));
    }
    public function edit($id)
    {
        // Lấy thông tin đơn hàng theo id
        $order = DB::table('donhang')->where('id', $id)->first();

        if (!$order) {
            abort(404, 'Đơn hàng không tồn tại.');
        }

        return view('admin.donhang.editorders', compact('order'));
    }
    public function destroy($id)
    {
        $order = DB::table('donhang')->where('id', $id)->first();

        if (!$order) {
            abort(404, 'Đơn hànghàng không tồn tại.');
        }

        DB::table('donhang')->where('id', $id)->delete();
        return redirect()->route('admin.donhang.orders')->with('success', 'Đơn hàng đã được xóa thành công.');
    }
    public function update(Request $request, $id)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'order_status' => 'required|string',
            'payment_status' => 'required|boolean',
            'sp'=>'required|string',
            'soluong'=>'required|int',
            'note' => 'nullable|string',
        ]);

        // Cập nhật dữ liệu trong bảng orders
        $updated = DB::table('donhang')->where('id', $id)->update([
            'khachhang' => $request->customer_name,
            'trangthaidonhang' => $request->order_status,
            'trangthai' => $request->payment_status,
            'sanpham'=>$request->sp,
            'soluong'=>$request->soluong,
            'ghichu' => $request->note,
            'time' => now()
        ]);
        if ($updated) {
            return redirect()->route('admin.donhang.orders')->with('success', 'Đơn hàng đã được cập nhật thành công.');
        } else {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi cập nhật đơn hàng.');
        }
    }
}
