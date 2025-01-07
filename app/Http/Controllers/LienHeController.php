<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LienHeController extends Controller
{
    // Hiển thị danh sách liên hệ
    public function index()
    {
        // Lấy tất cả liên hệ từ bảng 'lienhe'
        $contacts = DB::table('lienhe')->get();
        return view('admin.lienhe.index', compact('contacts'));
    }

    // Cập nhật liên hệ (không cần trang sửa riêng)
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'sdt'       => 'required|string|max:50',
            'noidung'   => 'required|string',
            'thoigian'  => 'required|date',
            'khachhang' => 'required|string|max:255',
        ]);

        DB::table('lienhe')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'sdt' => $request->input('sdt'),
                'noidung' => $request->input('noidung'),
                'thoigian' => $request->input('thoigian'),
                'khachhang' => $request->input('khachhang'),
            ]);

        return redirect()->route('lienhe.index')->with('success', 'Cập nhật liên hệ thành công');
    }

    // Xóa liên hệ
    public function destroy($id)
    {
        DB::table('lienhe')->where('id', $id)->delete();
        return redirect()->route('lienhe.index')->with('success', 'Xóa liên hệ thành công');
    }
}
