<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImgSp extends Model
{
    protected $table = 'img_sp';
    public $timestamps = false;
    protected $fillable = ['img', 'sanpham'];

    // Quan hệ với bảng sản phẩm (nếu cần)
    /* public function product()
    {
        return $this->belongsTo(SanPham::class, 'sanpham', 'id');
    } */
}
