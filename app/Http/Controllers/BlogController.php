<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use App\Models\SanPham;
use App\Models\Category; // Đảm bảo gọi đúng Model
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog()
    {
         // Lấy tất cả các loại kèm theo sản phẩm
        $categories = Categori::with('products')->get();
        $categoryIphone = Categori::with('products')->where('name', 'Iphone')->first();
        $categorySamsung = Categori::with('products')->where('name', 'SamSung')->first();
        $categoryXiaomi = Categori::with('products')->where('name', 'XiaoMi')->first();
        $categoryGoogle = Categori::with('products')->where('name', 'Google')->first();
        $categoryOppo = Categori::with('products')->where('name', 'Oppo')->first();
        $categoryHuawei = Categori::with('products')->where('name', 'Huawei')->first();

    
         return view('lienhe.blog', compact('categories','categoryIphone',
         'categorySamsung','categoryXiaomi','categoryGoogle','categoryOppo','categoryHuawei'));
    }
    public function getFeaturedProducts($categoryId)
{
    $sl = 2;

    if ($categoryId == 32 ||$categoryId==3||$categoryId==2) {
        $sl = 1;
    }
    $products = SanPham::where('categori', $categoryId)
        ->inRandomOrder()
        ->take($sl)
        ->with('blog') // Load quan hệ blog
        ->get();

    return response()->json([
        'products' => $products->map(function ($product) {
            return [
                'name' => $product->name,
                'avt' => $product->avt,
                'tieude' => $product->blog->tieude ?? 'Chưa có tiêu đề',
                'noidung' => $product->blog->noidung ?? 'Chưa có nội dung',
            ];
        }),
    ]);
}
}
