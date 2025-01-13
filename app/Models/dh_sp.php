<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class dh_sp extends Model
{
    use HasFactory;
    protected $table = 'dh_sp';

    protected $fillable = [
        'id_donhang',
        'sanpham',
    ];
    public function donhang()
    {
        return $this->belongsTo(DonHang::class, 'id_donhang');
    }
    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'sanpham');
    }
}
