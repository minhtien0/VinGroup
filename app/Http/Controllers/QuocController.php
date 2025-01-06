<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;



class QuocController extends Controller
{
   
   public function Logingiohang()
   {
      return view('dangnhap.Login');
   }
   public function Login(Request $request)
{
    $request->validate([
        'login' => 'required', // Email hoặc số điện thoại là bắt buộc
        'password' => 'required|min:3', // Mật khẩu không được bỏ trống và ít nhất 3 ký tự
    ], [
        'login.required' => 'Vui lòng nhập số điện thoại hoặc email.',
        'password.required' => 'Vui lòng nhập mật khẩu.',
        'password.min' => 'Mật khẩu phải có ít nhất 3 ký tự.',
    ]);

    // Kiểm tra tên đăng nhập (email hoặc số điện thoại)
    $user = DB::table('user')
        ->where(function ($query) use ($request) {
            $query->where('gmail', $request->login)
                  ->orWhere('sdt', $request->login);
        })
        ->first();

    // Nếu không tìm thấy người dùng
    if (!$user) {
        return redirect()->back()->withErrors([
            'login' => 'Tên đăng nhập không tồn tại.',
        ])->with('login_error', true);
    }

    // Kiểm tra mật khẩu
    if ($user->password !== $request->password) {
        return redirect()->back()->withErrors([
            'password' => 'Mật khẩu không chính xác.',
        ])->with('login_error', true);
    }

    // Lưu thông tin người dùng vào session
    $request->session()->put('user', $user);

    // Đăng nhập thành công
    return redirect()->route('home.index')->with('success', 'Đăng nhập thành công!');
}
public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('home.index')->with('success', 'Đăng xuất thành công!');
}

   public function index()
   {
      return view('Layouts.index');
   }
   public function dangky(Request $request)
   {
       // Validate dữ liệu
      $request->validate([
         'name' => 'required|min:5|max:255',
         'gmail' => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/',
         'SDT' => 'required|numeric|unique:user,SDT',
         'gioitinh' => 'required|in:male,female',
         'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
         'password' => 'required|confirmed|min:3',
      ]);
 
      // Lưu ảnh đại diện
      $avatarPath = $request->hasFile('avt') ? $request->file('avt')->store('avt', 'public') : null;
      // Lưu thông tin vào cơ sở dữ liệu
         DB::table('user')->insert([
            'name' => $request->name,
            'gmail' => $request->gmail,
            'SDT' => $request->SDT,
            'gioitinh' => $request->gioitinh,
            'avt' => $avatarPath,
            'address'=>$request->address,
            'password'=>$request->password,
         ]);

         return redirect()->back()->with('success', 'Tài khoản đã được thêm thành công!');
   }
}
