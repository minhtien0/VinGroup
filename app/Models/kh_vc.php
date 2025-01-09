<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kh_vc extends Model
{
    use HasFactory;

    protected $table = 'kh_vc';

    protected $fillable = [
        'id',
        'khachhang',
        'voucher',
        'soluong',
    ];
    public function voucher()
{
    return $this->belongsTo(Voucher::class, 'voucher', 'id');
}

public function user()
{
    return $this->belongsTo(User::class, 'khachhang', 'id');
}

}
