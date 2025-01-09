<?php

namespace App\Models;
use App\Models\SanPham;
use App\Models\ImgSp;

use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    protected $table = 'giohang';
    public $timestamps = false;
    protected $fillable = ['khachhang', 'sanpham', 'soluong'];

    // Quan hệ với bảng sản phẩm
    public function product()
    {
        return $this->belongsTo(SanPham::class, 'sanpham');
    }

    // Quan hệ với bảng img_sp (mỗi sản phẩm có thể có nhiều hình ảnh)
    public function images()
    {
        return $this->hasMany(ImgSp::class, 'sanpham', 'sanpham');
    }

    // Quan hệ với bảng user
    public function user()
    {
        return $this->belongsTo(User::class, 'khachhang');
    }
}
