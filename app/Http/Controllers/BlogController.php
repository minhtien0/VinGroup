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
        $categorySamsung = Categori::with('products')->where('name', 'Samsung')->first();
        $categoryXiaomi = Categori::with('products')->where('name', 'Xiaomi')->first();
        $categoryGoogle = Categori::with('products')->where('name', 'Google')->first();
        $categoryOppo = Categori::with('products')->where('name', 'Oppo')->first();
        $categoryNokia = Categori::with('products')->where('name', 'Nokia')->first();

    
         return view('lienhe.blog', compact('categories','categoryIphone',
         'categorySamsung','categoryXiaomi','categoryGoogle','categoryOppo','categoryNokia'));
    }
    public function getFeaturedProducts($categoryId)
{
    // Lấy 2 sản phẩm ngẫu nhiên thuộc danh mục cùng blog liên quan
    $products = SanPham::where('categori', $categoryId)
        ->inRandomOrder()
        ->take(2)
        ->with('blog') // Eager load blog liên quan
        ->get();

    // Định dạng lại dữ liệu để trả về JSON
    $formattedProducts = $products->map(function ($product) {
        return [
            'name' => $product->name,
            'avt' => $product->avt,
            'tieude' => $product->blog->tieude ?? 'Chưa có tiêu đề',
            'noidung' => $product->blog->noidung ?? 'Chưa có nội dung',
        ];
    });

    return response()->json(['products' => $formattedProducts]);
}
}
