<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Users extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        
        'password',
        'name',
        'sdt',
        'address',
        'gmail',
        'gioitinh',
        'avatar',
    ];

    public function kh_vc()
    {
        return $this->hasMany(kh_vc::class, 'khachhang', 'id');
    }

    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class, 'kh_vc', 'khachhang', 'voucher');
    }


}

