<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    public function index()
    {
        return view('home.test');
    }

    public function showDonHang(Request $request)
    {
        // Lấy thông tin người dùng từ session
        $user = $request->session()->get('user');
        $donhang = DB::table('donhang')
        ->join('dh_sp', 'donhang.id', '=', 'dh_sp.id_donhang') // Liên kết bảng đơn hàng và bảng chi tiết đơn hàng
        ->join('product', 'dh_sp.sanpham', '=', 'product.id') // Liên kết bảng chi tiết đơn hàng với bảng sản phẩm
        ->where('donhang.khachhang', $user->id) // Lọc theo khách hàng
        ->whereIn('donhang.trangthaidonhang', ['Chờ Thanh Toán', 'Đã Thanh Toán']) // Trạng thái đơn hàng
        ->select(
            'donhang.madon', // Mã đơn hàng
            'product.name as name', // Tên sản phẩm
            'product.price as price', // Giá sản phẩm
            'product.color', // Màu sản phẩm
            'product.gb as gb', // Dung lượng sản phẩm
            'product.avt as avt', // Ảnh sản phẩm
            'product.slug', // Slug sản phẩm
            'dh_sp.soluong as soluong', // Số lượng sản phẩm
            'donhang.time as time', // Thời gian đặt hàng
            'donhang.trangthaidonhang as trangthaidonhang', // Trạng thái đơn hàng
            DB::raw('product.price * dh_sp.soluong AS total_price') // Tổng giá tiền
        )
        ->get();


            $donggoi = DB::table('donhang')
    ->join('dh_sp', 'donhang.id', '=', 'dh_sp.id_donhang') // Liên kết bảng đơn hàng và chi tiết đơn hàng
    ->join('product', 'dh_sp.sanpham', '=', 'product.id') // Liên kết bảng chi tiết đơn hàng với bảng sản phẩm
    ->where('donhang.khachhang', $user->id) // Lọc theo ID khách hàng
    ->whereIn('donhang.trangthaidonhang', ['Đang Đóng Gói', 'Đã Đóng Gói']) // Lọc theo trạng thái đơn hàng
    ->select(
        'product.name as name', // Tên sản phẩm
        'product.price as price', // Giá sản phẩm
        'product.color as color', // Màu sản phẩm
        'product.gb as gb', // Dung lượng sản phẩm
        'product.avt as avt', // Ảnh sản phẩm
        'product.slug as slug', // Slug sản phẩm
        'dh_sp.soluong as soluong', // Số lượng sản phẩm
        'donhang.time as time', // Thời gian đơn hàng
        'donhang.trangthaidonhang as trangthaidonhang', // Trạng thái đơn hàng
        'donhang.madon as madon', // Mã đơn hàng
        DB::raw('product.price * dh_sp.soluong AS total_price') // Tổng tiền cho từng sản phẩm
    )
    ->get();

        
    $danggiaohang = DB::table('donhang')
    ->join('dh_sp', 'donhang.id', '=', 'dh_sp.id_donhang') // Liên kết bảng `donhang` với bảng `dh_sp`
    ->join('product', 'dh_sp.sanpham', '=', 'product.id') // Liên kết bảng `dh_sp` với bảng `product`
    ->where('donhang.khachhang', $user->id) // Lọc theo khách hàng hiện tại
    ->where('donhang.trangthaidonhang', 'Đang Giao Hàng') // Lọc theo trạng thái đơn hàng
    ->select(
        'product.name as name', // Tên sản phẩm
        'product.price as price', // Giá sản phẩm
        'product.color as color', // Màu sản phẩm
        'product.gb as gb', // Dung lượng sản phẩm
        'product.avt as avt', // Ảnh sản phẩm
        'product.slug as slug', // Slug sản phẩm
        'dh_sp.soluong as soluong', // Số lượng sản phẩm
        'donhang.time as time', // Thời gian đặt hàng
        'donhang.trangthaidonhang as trangthaidonhang', // Trạng thái đơn hàng
        'donhang.madon as madon', // Mã đơn hàng
        DB::raw('product.price * dh_sp.soluong AS total_price') // Tổng tiền cho từng sản phẩm
    )
    ->get();


    $donhangcomplete = DB::table('donhang')
    ->join('dh_sp', 'donhang.id', '=', 'dh_sp.id_donhang') // Liên kết bảng `donhang` với bảng `dh_sp`
    ->join('product', 'dh_sp.sanpham', '=', 'product.id') // Liên kết bảng `dh_sp` với bảng `product`
    ->where('donhang.khachhang', $user->id) // Lọc theo ID khách hàng hiện tại
    ->whereIn('donhang.trangthaidonhang', ['Hoàn Thành', 'Chờ Đánh Giá']) // Lọc trạng thái đơn hàng
    ->select(
        'product.id as id', // ID sản phẩm
        'product.name as name', // Tên sản phẩm
        'product.price as price', // Giá sản phẩm
        'product.color as color', // Màu sản phẩm
        'product.gb as gb', // Dung lượng sản phẩm
        'product.avt as avt', // Ảnh sản phẩm
        'product.slug as slug', // Slug sản phẩm
        'dh_sp.soluong as soluong', // Số lượng sản phẩm
        'donhang.time as time', // Thời gian đặt hàng
        'donhang.trangthaidonhang as trangthaidonhang', // Trạng thái đơn hàng
        'donhang.madon as madon', // Mã đơn hàng
        DB::raw('product.price * dh_sp.soluong AS total_price') // Tổng tiền sản phẩm
    )
    ->get();

    $donhangrate = DB::table('donhang')
    ->join('dh_sp', 'donhang.id', '=', 'dh_sp.id_donhang') // Liên kết bảng `donhang` với `dh_sp`
    ->join('product', 'dh_sp.sanpham', '=', 'product.id') // Liên kết bảng `dh_sp` với `product`
    ->where('donhang.khachhang', $user->id) // Lọc theo khách hàng đã đăng nhập
    ->where('donhang.trangthaidonhang', 'Chờ Đánh Giá') // Lọc trạng thái đơn hàng là "Chờ Đánh Giá"
    ->select(
        'product.id as id', // ID sản phẩm
        'product.name as name', // Tên sản phẩm
        'product.price as price', // Giá sản phẩm
        'product.color as color', // Màu sản phẩm
        'product.gb as gb', // Dung lượng sản phẩm
        'product.avt as avt', // Ảnh sản phẩm
        'product.slug as slug', // Slug sản phẩm
        'dh_sp.soluong as soluong', // Số lượng sản phẩm trong đơn hàng
        'donhang.time as time', // Thời gian đặt hàng
        'donhang.trangthaidonhang as trangthaidonhang', // Trạng thái đơn hàng
        'donhang.madon as madon', // Mã đơn hàng
        DB::raw('product.price * dh_sp.soluong AS total_price') // Tổng tiền từng sản phẩm
    )
    ->get();


    $donhangcancel = DB::table('donhang')
    ->join('dh_sp', 'donhang.id', '=', 'dh_sp.id_donhang') // Liên kết bảng `donhang` với `dh_sp`
    ->join('product', 'dh_sp.sanpham', '=', 'product.id') // Liên kết bảng `dh_sp` với `product`
    ->where('donhang.khachhang', $user->id) // Lọc theo khách hàng đã đăng nhập
    ->where('donhang.trangthaidonhang', 'Đã Hủy') // Lọc trạng thái đơn hàng là "Đã Hủy"
    ->select(
        'product.id as id', // ID sản phẩm
        'product.name as name', // Tên sản phẩm
        'product.price as price', // Giá sản phẩm
        'product.color as color', // Màu sản phẩm
        'product.gb as gb', // Dung lượng sản phẩm
        'product.avt as avt', // Ảnh sản phẩm
        'product.slug as slug', // Slug sản phẩm
        'dh_sp.soluong as soluong', // Số lượng sản phẩm trong đơn hàng
        'donhang.time as time', // Thời gian đặt hàng
        'donhang.trangthaidonhang as trangthaidonhang', // Trạng thái đơn hàng
        'donhang.madon as madon', // Mã đơn hàng
        DB::raw('product.price * dh_sp.soluong AS total_price') // Tổng tiền từng sản phẩm
    )
    ->get();

        // Trả về view với dữ liệu người dùng
        return view('home.taikhoan.index', [
            'user' => $user,
            'donhang' => $donhang,
            'donggoi'=>$donggoi,
            'donhangcomplete' => $donhangcomplete,
            'danggiaohang'=>$danggiaohang,
            'donhangcancel' => $donhangcancel,
            'donhangrate'=>$donhangrate
        ]);

    }

    public function showThongTin(Request $request)
    {
        // Lấy thông tin người dùng từ session
        $user = $request->session()->get('user');

        // Trả về view với dữ liệu người dùng
        return view('home.taikhoan.index', ['user' => $user]);
    }

public function showVoucher(Request $request){
    $user = $request->session()->get('user');
    return view('home.taikhoan.index', ['user' => $user]);
}
public function showyeuThich(Request $request){
    $user = $request->session()->get('user');
    $favorite=DB::table('yeuthich')->where('khachhang', $user->id)
    ->join('product', 'yeuthich.sanpham', '=', 'product.id')
    ->select('*')
    ->get();
    if (!$favorite) {
        return redirect()->with('error', 'Chưa có đơn hàng yêu thích');
    }
    return view('home.taikhoan.index', ['user' => $user,'favorite'=>$favorite]);
}
public function showTrangThai(Request $request, $madon)
{
    $user = $request->session()->get('user');

    if (!$user) {
        return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để xem trạng thái đơn hàng.');
    }

    // Lấy thông tin đơn hàng
    $donhang = DB::table('donhang')
        ->where('madon', $madon)
        ->where('khachhang', $user->id)
        ->first(); // Lấy 1 đơn hàng

    if (!$donhang) {
        abort(404, 'Không tìm thấy đơn hàng');
    }

    // Lấy danh sách sản phẩm liên quan đến đơn hàng từ bảng `dh_sp`
    $sanpham = DB::table('dh_sp')
        ->join('product', 'dh_sp.sanpham', '=', 'product.id')
        ->where('dh_sp.id_donhang', $donhang->id)
        ->select('product.*', 'dh_sp.soluong') // Lấy thông tin sản phẩm và số lượng
        ->get();

    return view('home.taikhoan.trangthai', [
        'user' => $user,
        'donhang' => $donhang,
        'sanpham' => $sanpham, // Truyền danh sách sản phẩm
    ]);
}

/*     public function login(Request $request)
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

    public function logout(Request $request)
    {
        // Xóa session của người dùng
        $request->session()->forget('user');
        $request->session()->flush();

        // Trả về phản hồi JSON hoặc chuyển hướng
        return response()->json(['success' => true, 'message' => 'Đăng xuất thành công']);
    }
 */
    public function detail(Request $request,$slug, $id)
    {
        // Lấy thông tin sản phẩm theo ID
        $product = DB::table('product')
        ->select('id', 'name', 'gb', 'color', 'price','soluong','categori','categori_child','avt','loai','slug','trangthai', DB::raw('SUM(soluong) as tong_soluong'))
        ->where('id', $id) // Lọc theo id sản phẩm
        ->groupBy('id', 'name', 'gb', 'color', 'price','soluong','categori','categori_child','avt','loai','slug','trangthai') // Nhóm theo tất cả các cột được chọn
        ->first();

        $product_categori = DB::table('product')
        ->join('categori', 'product.categori', '=', 'categori.id') 
        ->select('categori.name as categori_name')
        ->where('product.id', $id) // Chỉ định rõ product.id
        ->first();

        $relatedProducts = DB::table('product')
        ->where('categori', $product->categori) // Cùng danh mục
        ->where('id', '!=', $id) // Không bao gồm sản phẩm hiện tại
        ->inRandomOrder() // Sắp xếp ngẫu nhiên
        ->limit(4) // Lấy 4 sản phẩm
        ->get();
        $user = $request->session()->get('user');
        // Lấy danh sách hình ảnh liên quan đến sản phẩm
        $img = DB::table('img_sp')
            ->join('product', 'img_sp.sanpham', '=', 'product.id') // Join bảng img_sp với product
            ->where('product.id', $id) // Lọc theo sản phẩm được chọn
            ->select('img_sp.*', 'img_sp.img as imgchitiet') // Lấy dữ liệu cần thiết
            ->get();

        $options = DB::table('product')
            ->select('name','gb', 'color', 'price',DB::raw('SUM(soluong) as tong_soluong'))
            ->where('name', $product->name) 
            ->groupBy('name','gb', 'color', 'price')
            ->get();
        $gigabyte = DB::table('product')
            ->select('gb', DB::raw('MIN(price) as min_price')) // Lấy gb và giá thấp nhất
            ->where('name', $product->name) // Lọc theo tên sản phẩm
            ->groupBy('gb') // Nhóm theo gb
            ->orderBy('gb', 'asc') // Sắp xếp theo gb (nếu cần)
            ->get();
            $allcomment = DB::table('comment')
            ->leftJoin('img_comment', 'comment.id', '=', 'img_comment.binhluan')
            ->select(
                'comment.id as comment_id',
                'comment.avt',
                'comment.name',
                'comment.content',
                'comment.rate',
                'comment.khachhang',
                'comment.time',
                'comment.sanpham',
                DB::raw('GROUP_CONCAT(img_comment.img) as images') // Gộp các ảnh lại
            )
            ->where('comment.sanpham', $id)
            ->groupBy(
                'comment.id',
                'comment.avt',
                'comment.name',
                'comment.content',
                'comment.rate',
                'comment.khachhang',
                'comment.time',
                'comment.sanpham'
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
        $sumrate = $rates->sum('total');
        //trung bình đánh giá
        $averageRate = DB::table('comment')
            ->where('sanpham', $id)
            ->avg('rate');

        $averageRate = $averageRate ? round($averageRate, 1) : 0;

        //yeuthich
        $isFavorite = false; // Mặc định không yêu thích
        if ($user) {
            $isFavorite = DB::table('yeuthich')
                ->where('khachhang', $user->id)
                ->where('sanpham', $id)
                ->exists(); // Trả về true nếu sản phẩm đã được yêu thích
        }
        // Trả về view với dữ liệu sản phẩm và hình ảnh
        return view('home.detail', [
            'product' => $product,
            'product_categori'=>$product_categori,
            'img' => $img,
            'options' => $options,
            'gigabyte' => $gigabyte,
            'allcomment' => $allcomment,
            'rates' => $rates,
            'relatedProducts'=> $relatedProducts,
            'sumrate' => $sumrate,
            'allRatings' => $allRatings,
            'averageRate' => $averageRate,
            'isFavorite' => $isFavorite
        ]);
    }

    public function AddGioHang(Request $request){
        $user = $request->session()->get('user');

        if (!$user) {
            return redirect()->back()->with('error', 'Vui lòng đăng nhập để thêm vào giỏ hàng.');
        }

        $request->validate([
            'sanpham' => 'required|integer', // ID sản phẩm
            'soluong' => 'required|integer|min:1', // Số lượng sản phẩm
        ]);

        DB::table('giohang')->insert([
            'khachhang' => $user->id,
            'sanpham' => $request->input('sanpham'),
            'soluong' => $request->input('soluong'), // Lưu số lượng vào giỏ hàng
        ]);

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
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
            'img.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Thêm dữ liệu vào bảng 'comment'
        $result = DB::table('comment')->insertGetId([
            'name' => $user->name, // Lấy name từ session
            'avt' => $user->avt,
            'time' => now(),
            'content' => $request->input('content'),
            'rate' => $request->input('rate'),
            'khachhang' => $user->id, // Lấy id từ session
            'sanpham' => $request->input('sanpham'), // ID sản phẩm
            'trangthai' => 1, // Mặc định trạng thái là 1 (kích hoạt)
        ]);
        
        if ($request->hasFile('img')) {
            foreach ($request->file('img') as $image) {
                // Kiểm tra file hợp lệ
                if ($image->isValid()) {
                    // Tạo tên duy nhất cho file ảnh
                    $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        
                    // Lưu ảnh vào thư mục 'public/img'
                    $image->move(public_path('img'), $imageName);
        
                    // Lưu thông tin ảnh vào bảng 'img_comment'
                    DB::table('img_comment')->insert([
                        'img' =>$imageName, // Đường dẫn lưu ảnh
                        'binhluan' => $result, // ID của bình luận
                    ]);
                } else {
                    return redirect()->back()->with('error', 'Một hoặc nhiều tệp không hợp lệ.');
                }
            }
        }        

        DB::table('donhang')
        ->join('dh_sp', 'donhang.id', '=', 'dh_sp.id_donhang') // Kết nối bảng `dh_sp` và `donhang`
        ->where('donhang.khachhang', $user->id) // Lọc theo khách hàng
        ->where('dh_sp.sanpham', $request->input('sanpham')) // Lọc theo sản phẩm
        ->update([
            'donhang.trangthaidonhang' => "Hoàn Thành"
        ]);

        if ($result) {
            return redirect()->route('account.donhang')->with('success', 'Bình luận đã được thêm thành công!');
        } else {
            return redirect()->back()->with('error', 'Không thể thêm bình luận.');
        }
    }

    public function AddFavorite(Request $request)
    {
        $user = $request->session()->get('user');
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Bạn cần đăng nhập để sử dụng tính năng này.'], 401);
        }

        $sanpham = $request->input('sanpham');

        // Kiểm tra nếu sản phẩm đã được yêu thích
        $favorite = DB::table('yeuthich')
            ->where('khachhang', $user->id)
            ->where('sanpham', $sanpham)
            ->first();

        if ($favorite) {
            // Nếu đã yêu thích, thì hủy yêu thích
            DB::table('yeuthich')
                ->where('khachhang', $user->id)
                ->where('sanpham', $sanpham)
                ->delete();

            return response()->json(['success' => true, 'isFavorite' => false, 'message' => 'Đã hủy yêu thích.']);
        } else {
            // Nếu chưa yêu thích, thêm vào danh sách yêu thích
            DB::table('yeuthich')->insert([
                'khachhang' => $user->id,
                'sanpham' => $sanpham,
                'time' => now(),
                'trangthai' => 1,
            ]);

            return response()->json(['success' => true, 'isFavorite' => true, 'message' => 'Đã thêm vào yêu thích.']);
        }
    }

    public function HuyDon(Request $request, $madon)
    {
        $user = $request->session()->get('user');
    
        if (!$user) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để hủy đơn hàng.');
        }
    
        // Cập nhật trạng thái đơn hàng thành "Đã Hủy"
        $result = DB::table('donhang')
            ->where('khachhang', $user->id)
            ->where('madon', '=', $madon)
            ->update(['trangthaidonhang' => 'Đã Hủy']);
    
        if ($result) {
            return redirect()->route('account.donhang')->with('success', 'Đơn hàng đã bị hủy!');
        } else {
            return redirect()->back()->with('error', 'Không thể hủy đơn hàng. Vui lòng thử lại.');
        }
    }
    
    //// cai nay của huy dong 
    public function showRandomProducts()
    {
        // Lấy 6 sản phẩm ngẫu nhiên
        $products = DB::table('product')
            ->inRandomOrder() // Lấy sản phẩm ngẫu nhiên
            ->limit(6) // Giới hạn số lượng sản phẩm (ở đây là 6)
            ->get();

        // Trả về view với danh sách sản phẩm
        return view('home.index', ['products' => $products]);
    }



}