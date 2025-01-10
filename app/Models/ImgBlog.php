<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImgBlog extends Model
{
    use HasFactory;

    protected $table = 'img_blog';

    protected $fillable = [
        'img',
        'blog_id',
        'time',
        'trangthai',
    ];

    // Quan hệ với bảng Blog
    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }
}

