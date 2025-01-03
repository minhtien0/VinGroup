<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller 
{ 
    public function index(){
        return view('home.test');
    }

    public function showDonHang(Request $request)
    {
        // Lấy thông tin người dùng từ session
        $user = $request->session()->get('user');
        $donhang = DB::table('donhang')
        ->join('product', 'donhang.sanpham', '=', 'product.id')
        ->where('donhang.khachhang', $user->id)
        ->where('donhang.trangthaidonhang', 'Chờ Thanh Toán')
        ->select(
            'product.name', 
            'product.price', 
            'product.color', 
            'product.gb',
            'product.avt',
            'donhang.soluong', 
            'donhang.time', 
        DB::raw('product.price * donhang.soluong AS total_price')
        )
        ->get();

        $donhangcomplete = DB::table('donhang')
        ->join('product', 'donhang.sanpham', '=', 'product.id')
        ->where('donhang.khachhang', $user->id)
        ->whereIn('donhang.trangthaidonhang', ['Hoàn Thành', 'Chờ Đánh Giá'])
        ->select(
            'product.id', 
            'product.name', 
            'product.price', 
            'product.color', 
            'product.gb',
            'product.avt',
            'donhang.soluong', 
            'donhang.time',
            'donhang.trangthaidonhang',
        DB::raw('product.price * donhang.soluong AS total_price')
        )
        ->get();

        // Trả về view với dữ liệu người dùng
        return view('home.taikhoan.index', ['user' => $user,'donhang' => $donhang, 'donhangcomplete' => $donhangcomplete]);
       
    }
  
    public function showThongTin(Request $request)
{
    // Lấy thông tin người dùng từ session
    $user = $request->session()->get('user');

    // Trả về view với dữ liệu người dùng
    return view('home.taikhoan.index', ['user' => $user]);
}

    

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required', // Email hoặc số điện thoại là bắt buộc
            'password' => 'required|min:6', // Mật khẩu không được bỏ trống và ít nhất 6 ký tự
        ], [
            'login.required' => 'Vui lòng nhập số điện thoại hoặc email.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
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
            return response()->json([
                'success' => false,
                'message' => 'Tên đăng nhập không tồn tại.',
            ], 200);
        }
    
        // Kiểm tra mật khẩu
        // Khuyến nghị sử dụng hàm hash để kiểm tra mật khẩu thay vì so sánh trực tiếp
        if ($user->password !== $request->password) {
            return response()->json([
                'success' => false,
                'message' => 'Mật khẩu không chính xác.',
            ], 200);
        }
        
        $request->session()->put('user', $user);
        // Nếu cả tên đăng nhập và mật khẩu đều đúng
        return response()->json([
            'success' => true,
            'user' => $user, // Trả về thông tin người dùng
        ]);
    }
    


    public function detail(Request $request, $id)
    {
        // Lấy thông tin sản phẩm theo ID
        $product = DB::table('product')->where('id', $id)->first();
    
        // Lấy danh sách hình ảnh liên quan đến sản phẩm
        $img = DB::table('img_sp')
            ->join('product', 'img_sp.sanpham', '=', 'product.id') // Join bảng img_sp với product
            ->where('product.id', $id) // Lọc theo sản phẩm được chọn
            ->select('img_sp.*', 'img_sp.img as imgchitiet') // Lấy dữ liệu cần thiết
            ->get();

        $options = DB::table('product')
            ->select('gb', 'color', 'price')
            ->where('name', $product->name) // Lọc theo tên sản phẩm
            ->get();
        $gigabyte = DB::table('product')
            ->select('gb', DB::raw('MIN(price) as min_price')) // Lấy gb và giá thấp nhất
            ->where('name', $product->name) // Lọc theo tên sản phẩm
            ->groupBy('gb') // Nhóm theo gb
            ->orderBy('gb', 'asc') // Sắp xếp theo gb (nếu cần)
            ->get();
        $allcomment = DB::table('comment')
        ->where('sanpham', $id)
        ->select(
            'comment.avt', 
            'comment.name', 
            'comment.content', 
            'comment.rate', 
            'comment.khachhang',
            'comment.time',
        )
        ->get();
        //lấy từng sao đánh giá
        $allRatings = [
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
        ];
        
        $rates = DB::table('comment')
            ->where('sanpham', $id)
            ->select('rate', DB::raw('COUNT(*) as total'))
            ->groupBy('rate')
            ->get();
        
        // Gán số lượng đánh giá từ database vào mảng mặc định
        foreach ($rates as $rate) {
            $allRatings[$rate->rate] = $rate->total;
        }
        //tổng đánh giágiá
        $sumrate=$rates->sum('total');
        //trung bình đánh giá
        $averageRate = DB::table('comment')
        ->where('sanpham', $id)
        ->avg('rate');
    
        $averageRate = $averageRate ? round($averageRate, 1) : 0;
        // Trả về view với dữ liệu sản phẩm và hình ảnh
        return view('home.detail', ['product' => $product, 'img' => $img,'options'=>$options, 
        'gigabyte' => $gigabyte,'allcomment'=>$allcomment,'rates'=>$rates,'sumrate'=>$sumrate,
        'allRatings'=>$allRatings,'averageRate'=>$averageRate
        ]);
    }
    

    public function test()
    {
        $sp = DB::table('product')
        ->join('categori', 'product.categori', '=', 'categori.id') // Join với bảng category
        ->select('product.*', 'categori.name as category_name') // Lấy dữ liệu cần thiết
        ->get();


        // Trả dữ liệu về view
        return view('home.test', compact('sp'));
    }

 
public function UpdateInfoUser(Request $request, $id)
{
        // Xác thực dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'gioitinh' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'gmail' => 'required|string|max:255',
            'sdt' => 'required|integer|max:11',
            'avt' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Lấy thông tin hiện tại từ cơ sở dữ liệu
        $user = DB::table('user')->where('id', $id)->first();
    
        // Kiểm tra nếu có file ảnh mới được tải lên
        if ($request->hasFile('image')) {
            // Đặt tên tệp dựa trên thời gian hiện tại
            $imageName = time() . '.' . $request->image->extension();
    
            // Di chuyển ảnh vào thư mục public/images
            $request->image->move(public_path('images'), $imageName);
    
            // Đường dẫn ảnh mới
            $imagePath = '' . $imageName;
        } else {
            // Nếu không có ảnh mới, giữ lại đường dẫn ảnh cũ
            $imagePath = $user->avt;
        }
    
        // Cập nhật dữ liệu vào bảng 'info'
        DB::table('user')->where('id', $id)->update([
            'name' => $request->input('name'),
            'add' => $request->input('address'),
            'gioitinh' => $request->input('gioitinh'),
            'gmail' => $request->input('gmail'),
            'address' => $request->input('gmail'),
            'password' => Hash::make($request->input('password')), // Mã hóa mật khẩu
            'avt' => $imagePath, // Lưu lại đường dẫn ảnh mới hoặc cũ

        ]);
    
        // Quay về trang dbcon với thông báo thành công
        return redirect()->route('account.thongtin')->with('success', 'Dữ liệu đã được cập nhật thành công!');
}

public function AddRates(Request $request)
{
    // Lấy thông tin user từ session
    $user = $request->session()->get('user');

    if (!$user) {
        return redirect()->back()->with('error', 'Bạn cần đăng nhập để thực hiện đánh giá.');
    }

    // Xác thực dữ liệu
    $request->validate([
        'content' => 'required|string',
        'rate' => 'required|integer|min:1|max:5',
        'sanpham' => 'required|integer', // ID sản phẩm
    ]);

    // Thêm dữ liệu vào bảng 'comment'
    $result = DB::table('comment')->insert([
        'name' => $user->name, // Lấy name từ session
        'avt' => $user->avt,
        'time' => now(),
        'content' => $request->input('content'),
        'rate' => $request->input('rate'),
        'khachhang' => $user->id, // Lấy id từ session
        'sanpham' => $request->input('sanpham'), // ID sản phẩm
        'trangthai' => 1, // Mặc định trạng thái là 1 (kích hoạt)
    ]);
    DB::table('donhang')
    ->where('khachhang', $user->id)
    ->where('sanpham', $request->input('sanpham')) // Không cần `andWhere`, chỉ cần thêm where
    ->update([
        'trangthaidonhang' => "Hoàn Thành"
    ]);

    if ($result) {
        return redirect()->route('home.test')->with('success', 'Bình luận đã được thêm thành công!');
    } else {
        return redirect()->back()->with('error', 'Không thể thêm bình luận.');
    }
}
}