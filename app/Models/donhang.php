<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;

    protected $table = 'DonHang';

    protected $fillable = [
        'madon',
        'khachhang',
        'sanpham',
        'soluong',
        'trangthai',
        'trangthaidonhang',
        'ghichu',
        'time',
    ];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class, 'khachhang', 'id');
    }
    // Quan hệ với Product thông qua bảng phụ
    public function product()
    {
        return $this->belongsTo(SanPham::class, 'sanpham', 'id');
    }
}