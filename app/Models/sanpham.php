<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    // Liên kết với bảng `product`
    protected $table = 'product'; 
    protected $fillable = ['id', 'name', 'price', 'color','gb', 'soluong', 'categori', 'avt','slug', 'trangthai']; // Columns
}
