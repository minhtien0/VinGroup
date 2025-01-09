<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('blog', function (Blueprint $table) {
            $table->string('img')->nullable()->after('name'); // Cột img để lưu đường dẫn ảnh
            $table->text('noi_dung')->nullable()->after('img'); // Cột nội dung bài viết
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blog', function (Blueprint $table) {
            $table->dropColumn('img');
            $table->dropColumn('noi_dung');
        });
    }
};
