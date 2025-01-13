<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lienhe extends Model
{
    protected $table = 'lienhe'; 
    public $timestamps = false; 
    protected $fillable = [
        'khachhang',
        'name',
        'sdt',
        'email',
        'noidung',
        'thoigian',
    ];
}
