<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request)
{
    // Khởi tạo query builder
    $query = DB::table('donhang');

    // Áp dụng bộ lọc nếu có
    if ($request->filled('trangthai')) {
        $query->where('trangthai', $request->input('trangthai'));
    }

    if ($request->filled('trangthaidonhang')) {
        $query->where('trangthaidonhang', $request->input('trangthaidonhang'));
    }

    if ($request->filled('selected_date')) {
        $query->whereDate('time', $request->input('selected_date')); // Lọc theo ngày
    }

    // Sắp xếp theo thời gian mới nhất (mặc định)
    $query->orderBy('time', 'desc');

    // Phân trang để hiển thị dữ liệu tốt hơn
    $orders = $query->paginate(10); // 10 bản ghi mỗi trang

    // Trả về view cùng với dữ liệu
    return view('admin.donhang.orders', [
        'orders' => $orders,
        'filters' => $request->only(['trangthai', 'trangthaidonhang', 'selected_date']), // Giữ lại giá trị bộ lọc
    ]);
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
        // Kiểm tra đơn hàng có tồn tại hay không
        $order = DB::table('donhang')->where('id', $id)->first();
    
        if (!$order) {
            return redirect()->route('admin.donhang.orders')
                             ->with('error', 'Đơn hàng không tồn tại.');
        }
    
        // Sử dụng transaction để đảm bảo tính toàn vẹn dữ liệu
        DB::beginTransaction();
        try {
            // Xóa chi tiết đơn hàng trong bảng `dh_sp`
            DB::table('dh_sp')->where('id_donhang', $id)->delete();
    
            // Xóa đơn hàng trong bảng `donhang`
            DB::table('donhang')->where('id', $id)->delete();
    
            // Commit transaction
            DB::commit();
    
            return redirect()->route('admin.donhang.orders')
                             ->with('success', 'Đơn hàng đã được xóa thành công!');
        } catch (\Exception $e) {
            // Rollback transaction nếu có lỗi xảy ra
            DB::rollBack();
    
            return redirect()->route('admin.donhang.orders')
                             ->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
    
    public function update(Request $request, $id)
{
    // Xác thực dữ liệu đầu vào
    $request->validate([
        'customer_name' => 'required|string|max:255',
        'order_status' => 'required|string',
        'payment_status' => 'required|boolean',
        'note' => 'nullable|string',
    ]);

    // Bắt đầu transaction
    DB::beginTransaction();
    try {
        // Cập nhật bảng `donhang`
        DB::table('donhang')->where('id', $id)->update([
            'khachhang' => $request->customer_name,
            'trangthaidonhang' => $request->order_status,
            'trangthai' => $request->payment_status,
            'ghichu' => $request->note,
            'time' => now(),
        ]);

        // Commit transaction
        DB::commit();

        return redirect()->route('admin.donhang.orders')->with('success', 'Đơn hàng đã được cập nhật thành công.');
    } catch (\Exception $e) {
        // Rollback transaction nếu có lỗi
        DB::rollBack();

        return redirect()->back()->with('error', 'Có lỗi xảy ra khi cập nhật đơn hàng: ' . $e->getMessage());
    }
}

}
