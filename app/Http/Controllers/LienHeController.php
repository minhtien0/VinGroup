<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\lienhe;


class LienHeController extends Controller
{
    public function Gioithieu() {
        return view('lienhe.gioithieu');
    }
    public function showkhlienhe(Request $request)
    {
        // Lấy thông tin người dùng từ session
    $user = $request->session()->get('user');
        // Trả về view form liên hệ
        return view('lienhe.khlienhe',compact('user'));
    }

    public function khlienhe(Request $request)
    {
        $user = $request->session()->get('user');
        // Kiểm tra hợp lệ dữ liệu
        $request->validate([
            'name'    => 'required|string',
            'sdt'     => 'required|string',
            'gmail'   => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/',
            'message' => 'required',
        ]);

        $lienHe = new lienhe();
        $lienHe->name    = $request->input('name');
        $lienHe->sdt     = $request->input('sdt');
        $lienHe->gmail   = $request->input('gmail');
        $lienHe->noidung = $request->input('message');
        
        // Nếu user đã đăng nhập, lưu ID vào cột khachhang
        if ($user) {
            $lienHe->khachhang = $user->id; // Lưu ID vào cột khachhang
        }
        
        // Nếu bạn có cột thoigian => lưu thời điểm
        $lienHe->thoigian = now();

        $lienHe->save();

        return redirect()->route('home.index')->with('success', 'Cảm ơn bạn đã liên hệ chúng tôi!');
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
