<?php
namespace App\Http\Controllers;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DongController extends Controller
{
    public function dashboard()
    {
        return view('home.admin.dashboard');
    }
    public function index()
    {
        $categori = DB::table('categori')->get();
        $products = DB::table('product')
            ->inRandomOrder() // Lấy sản phẩm ngẫu nhiên
            ->limit(6) // Giới hạn số lượng sản phẩm (ở đây là 5)
            ->get();

        // Trả về view với danh sách sản phẩm
        return view('home.index', ['products' => $products], compact('categori'));
    }
    public function Policy()
    {
        return view('layouts.home.policy');
    }

    public function IPhone()
    {
        return view('layouts.home.IPhone');
    }
    //thanh tìm kiếm
    public function searchAjax(Request $request)
{
    $keyword = $request->input('keyword');
    $products = DB::table('product')
        ->where('name', 'LIKE', '%' . $keyword . '%')
        ->orWhere('color', 'LIKE', '%' . $keyword . '%')
        ->orWhere('gb', 'LIKE', '%' . $keyword . '%')
        ->limit(10)
        ->get();

    if ($products->isEmpty()) {
        return response()->json(['message' => 'No products found'], 404);
    }

    return response()->json($products);
}
public function detail($slug)
{
    $product = DB::table('product')
        ->where('slug', $slug)
        ->first();

    if (!$product) {
        abort(404); // Nếu không tìm thấy sản phẩm, trả về trang 404
    }

    return view('home.product.detail', compact('product'));
}
    public function getCategoryName($slug)
    {
        // Tìm danh mục dựa trên slug
        $category = DB::table('categori')->where('slug', $slug)->first();

        if ($category) {
            return response()->json(['name' => $category->name], 200);
        }

        return response()->json(['error' => 'Category not found'], 404);
    }
    public function showCategory($slug)
    {
        // Lấy thông tin danh mục dựa trên slug
        $category = DB::table('categori')->where('slug', $slug)->first();

        if (!$category) {
            abort(404, 'Danh mục không tồn tại.');
        }

        // Lấy sản phẩm liên quan đến danh mục
        $products = DB::table('product')
            ->where('categori', $category->id)
            ->get();

        // Trả về view hiển thị danh mục và sản phẩm
        return view('layouts.home.IPhone', compact('category', 'products'));
    }

    //đây là xuất ra danh mục child-categori

    
}