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
    public function Info()
    {
        return view('layouts.home.info');
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
    public function getCategoryName($name)
    {
        // Tìm danh mục dựa trên slug
        $category = DB::table('categori')->where('name', $name)->first();

        if ($category) {
            return response()->json(['name' => $category->name], 200);
        }

        return response()->json(['error' => 'Category not found'], 404);
    }
    public function showCategory($name,Request $request)
    {
        // Lấy thông tin danh mục dựa trên slug
        
        $childCategories = DB::table('child_categori')
        ->join('categori', 'child_categori.parent_id', '=', 'categori.id')
        ->where('categori.name', '=', $name)
        ->select('child_categori.name', 'child_categori.id')
        ->get();
       

        // Lấy sản phẩm liên quan đến danh mục
        $childCategoryIds = $childCategories->pluck('id')->toArray();

        // Lấy sản phẩm liên quan đến các danh mục con
        $products = DB::table('product')
            ->whereIn('categori_child', $childCategoryIds)
            ->get();
        //// Lấy tên từ yêu cầu từ thanh tìm kiếm
        $name = $request->input('name');

        // Tìm sản phẩm dựa trên tên
        $productssearch = DB::table('product')
            ->where('name', 'LIKE', "%{$name}%") // Tìm theo tên có chứa từ khóa
            ->get();

        // Trả về view hiển thị danh mục và sản phẩm
        return view('layouts.home.IPhone', compact('childCategories','products','productssearch'));
    }

    //đây là xuất ra danh mục child-categori
    public function showIphoneCategory()
    {
        // Lấy thông tin danh mục cha là iPhone (id = 1)
        $parentCategory = DB::table('categori')->where('id', 1)->first();
    
        // Nếu không tìm thấy danh mục cha, trả về lỗi 404
        if (!$parentCategory) {
            abort(404, 'Danh mục cha không tồn tại.');
        }
    
        // Lấy danh sách danh mục con của iPhone (parent_id = 1)
        $childCategories = DB::table('child_categori')
            ->where('parent_id', 1)
            ->get();
    
        // Lấy danh sách sản phẩm liên quan đến danh mục cha
        $products = DB::table('product')
            ->where('categori', 1) // Lọc sản phẩm thuộc danh mục cha (categori_id = 1)
            ->get();
    
        // Trả dữ liệu về view IPhone.blade.php
        return view('layouts.home.IPhone', [
            'parentCategory' => $parentCategory,
            'childCategories' => $childCategories,
            'products' => $products,
        ]);
    }

    
}