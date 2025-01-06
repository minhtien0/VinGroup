<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::create(['loai' => 'Xiaomi', 'name' => 'Xiaomi31', 'trang_thai' => 1]);
        Blog::create(['loai' => 'Google', 'name' => 'Google', 'trang_thai' => 1]);
        Blog::create(['loai' => 'Oppo', 'name' => 'oppo1212', 'trang_thai' => 1]);
        Blog::create(['loai' => 'Nokia', 'name' => 'lummia', 'trang_thai' => 1]);
        
    }
}
