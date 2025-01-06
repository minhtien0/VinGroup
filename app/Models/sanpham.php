<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'id', 'name', 'price', 'color', 'gb', 'soluong', 'categori', 'avt', 'slug', 'trangthai'
    ];

    public function category()
    {
        return $this->belongsTo(Categori::class, 'categori', 'id');
    }
    //////////////
    public function blog()
    {
        return $this->hasOne(Blog::class, 'sanpham_id', 'id');
    }
}
