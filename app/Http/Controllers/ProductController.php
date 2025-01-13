<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; // Để tạo slug

class ProductController extends Controller
{
    // 1. Danh sách + tìm kiếm
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Tạo query
        $query = DB::table('product');

        // Nếu có từ khóa thì lọc
        if (!empty($search)) {
            $query->where('name', 'like', '%'.$search.'%');
        }

        // Lấy danh sách
        // Bạn có thể dùng paginate() nếu muốn phân trang
        $products = $query->orderBy('id', 'desc')->get();

        // Gắn danh sách ảnh (img_sp) cho từng sản phẩm
        $products->transform(function ($prod) {
            $images = DB::table('img_sp')
                ->where('sanpham', $prod->id)
                ->get();
            $prod->images = $images;
            return $prod;
        });

        return view('admin.products.index', compact('products', 'search'));
    }

    // 2. Form thêm
    public function create()
    {
        // Lấy danh mục cha
        $categories = DB::table('categori')->get();
        // Lấy danh mục con
        $childCategories = DB::table('child_categori')->get();

        return view('admin.products.create', compact('categories', 'childCategories'));
    }
    // 3. Lưu sản phẩm
    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'price'          => 'required|numeric',
            'color'          => 'nullable|string|max:50',
            'gb'             => 'nullable|integer',
            'soluong'        => 'nullable|integer',
            'categori'       => 'required|integer',
            'categori_child' => 'required|integer',
            'loai'           => 'nullable|string|max:50',
            'trangthai'      => 'required|in:0,1',
            'avt'            => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        // Upload avt (nếu có)
        $avtName = null;
        if ($request->hasFile('avt')) {
            $file = $request->file('avt');
            $avtName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('img'), $avtName);
        }

        // Tạo slug
        $slug = Str::slug($request->input('name'), '-');

        // Thêm product
        $productId = DB::table('product')->insertGetId([
            'name'           => $request->input('name'),
            'price'          => $request->input('price'),
            'color'          => $request->input('color'),
            'gb'             => $request->input('gb'),
            'soluong'        => $request->input('soluong'),
            'categori'       => $request->input('categori'),
            'categori_child' => $request->input('categori_child'),
            'avt'            => $avtName,
            'loai'           => $request->input('loai'),
            'slug'           => $slug,
            'trangthai'      => $request->input('trangthai'),
        ]);

        // Upload nhiều ảnh (img_sp)
        if ($request->hasFile('more_img')) {
            foreach ($request->file('more_img') as $imgFile) {
                $imgName = time().'_'.$imgFile->getClientOriginalName();
                $imgFile->move(public_path('img'), $imgName);

                DB::table('img_sp')->insert([
                    'img'     => $imgName,
                    'sanpham' => $productId
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Thêm sản phẩm thành công');
    }

    // 4. Form sửa
    public function edit($id)
    {
        $product = DB::table('product')->where('id', $id)->first();
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Sản phẩm không tồn tại');
        }

        // Lấy ảnh
        $images = DB::table('img_sp')->where('sanpham', $id)->get();
        // Danh mục cha
        $categories = DB::table('categori')->get();
        // Danh mục con
        $childCategories = DB::table('child_categori')->get();

        return view('admin.products.edit', compact('product', 'images', 'categories', 'childCategories'));
    }

    // 5. Cập nhật
    public function update(Request $request, $id)
    {
        $oldProduct = DB::table('product')->where('id', $id)->first();
        if (!$oldProduct) {
            return redirect()->route('products.index')->with('error', 'Sản phẩm không tồn tại');
        }

        $request->validate([
            'name'           => 'required|string|max:255',
            'price'          => 'required|numeric',
            'color'          => 'nullable|string|max:50',
            'gb'             => 'nullable|integer',
            'soluong'        => 'nullable|integer',
            'categori'       => 'required|integer',
            'categori_child' => 'required|integer',
            'loai'           => 'nullable|string|max:50',
            'trangthai'      => 'required|in:0,1',
            'avt'            => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        // Upload avt mới (nếu có)
        $avtName = $oldProduct->avt; 
        if ($request->hasFile('avt')) {
            $file = $request->file('avt');
            $avtName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('img'), $avtName);
        }

        // Tạo slug
        $slug = Str::slug($request->input('name'), '-');

        // Update product
        DB::table('product')->where('id', $id)->update([
            'name'           => $request->input('name'),
            'price'          => $request->input('price'),
            'color'          => $request->input('color'),
            'gb'             => $request->input('gb'),
            'soluong'        => $request->input('soluong'),
            'categori'       => $request->input('categori'),
            'categori_child' => $request->input('categori_child'),
            'avt'            => $avtName,
            'loai'           => $request->input('loai'),
            'slug'           => $slug,
            'trangthai'      => $request->input('trangthai'),
        ]);

        // Upload ảnh mới (img_sp) nếu có
        if ($request->hasFile('more_img')) {
            foreach ($request->file('more_img') as $imgFile) {
                $imgName = time().'_'.$imgFile->getClientOriginalName();
                $imgFile->move(public_path('img'), $imgName);

                DB::table('img_sp')->insert([
                    'img'     => $imgName,
                    'sanpham' => $id
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công');
    }

    // 6. Xoá
    public function destroy($id)
    {
        // Xoá ảnh chi tiết
        DB::table('img_sp')->where('sanpham', $id)->delete();

        // Xoá product
        DB::table('product')->where('id', $id)->delete();

        return redirect()->route('products.index')->with('success', 'Xoá sản phẩm thành công');
    }
}
