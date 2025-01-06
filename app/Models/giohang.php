<?php

namespace App\Models;
use App\Models\SanPham;

use Illuminate\Database\Eloquent\Model;


class giohang extends Model
{
    protected $table = 'giohang';
    public $timestamps = false;
    protected $fillable = ['khachhang', 'sanpham', 'soluong'];

    public function product()
    {
        return $this->belongsTo(SanPham::class, 'sanpham');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'khachhang');
    }
}
