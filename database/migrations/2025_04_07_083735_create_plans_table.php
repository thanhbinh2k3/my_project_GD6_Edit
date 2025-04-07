<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');                          // Tên gói dịch vụ
            $table->text('description')->nullable();         // Mô tả (tùy chọn)
            $table->decimal('price', 10, 2);                 // Giá tiền
            $table->integer('duration_days');               // Số ngày hiệu lực
            $table->timestamps();                            // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
