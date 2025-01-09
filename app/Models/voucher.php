<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voucher extends Model
{
    use HasFactory;
    protected $table = 'voucher';
    protected $fillable = [
        'id',
        'name',
        'code',
        'loai',
        'thanhtoan',
        'trangthai',
    ];
public function users()
{
    return $this->belongsToMany(User::class, 'kh_vc', 'voucher', 'khachhang');
}


}
