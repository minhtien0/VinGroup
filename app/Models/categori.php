<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categori extends Model
{
    use HasFactory;

    protected $table = 'categori';

    public function products()
    {
        return $this->hasMany(SanPham::class, 'categori', 'id');
    }
}
