<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();                        // id tự động tăng
            $table->string('title');            // tiêu đề
            $table->text('content');            // nội dung
            $table->timestamps();               // created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
