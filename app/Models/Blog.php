<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';

    protected $fillable = [
        'tieude',
        'noidung',
        'trangthai',
        'sanpham_id' // Liên kết với bảng product
    ];

    // Quan hệ với bảng Product
    // Quan hệ với bảng SanPham (Product)
    public function product()
    {
        return $this->belongsTo(SanPham::class, 'sanpham_id','id');
    }

    // Quan hệ với bảng Category thông qua Product
    public function categori()
    {
        return $this->hasOneThrough(Categori::class, SanPham::class, 'id', 'id', 'sanpham_id', 'categori');
    }

    // Quan hệ với bảng img_blog
    public function images()
    {
        return $this->hasMany(ImgBlog::class, 'blog_id');
    }
}

