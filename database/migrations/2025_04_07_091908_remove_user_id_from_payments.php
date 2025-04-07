<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUserIdFromPayments extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('user_id');  // Xóa cột user_id
        });
    }

    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');  // Thêm lại cột user_id nếu rollback
        });
    }
}

