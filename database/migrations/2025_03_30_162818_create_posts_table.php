<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Đoạn code này tạo bảng posts với các trường 'title', 'category', 'status' và các trường mặc định của Laravel.
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');  // Tiêu đề bài viết
            $table->string('category');  // Danh mục bài viết
            $table->enum('status', ['draft', 'published'])->default('draft'); // Kiểm tra status
            $table->timestamps();  // Trường created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Xóa bảng posts nếu migration bị rollback
        Schema::dropIfExists('posts');
    }
};
