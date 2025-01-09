<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donhang extends Model
{
    use HasFactory;

    protected $table = 'donhang';

    protected $fillable = [
        'madon',
        'khachhang',
        'sanpham',
        'trangthai',
        'trangthaidonhang',
        'ghichu',
        'soluong',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'khachhang', 'id');
    }
    
}
