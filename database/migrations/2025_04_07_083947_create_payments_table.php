<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');            // User thanh toán
            $table->unsignedBigInteger('plan_id');            // Gói dịch vụ
            $table->decimal('amount', 10, 2);                 // Số tiền thanh toán
            $table->string('payment_method');                // Phương thức thanh toán (ví dụ: VNPAY, Momo, PayPal)
            $table->enum('status', ['pending', 'success', 'failed']); // Trạng thái thanh toán
            $table->timestamp('paid_at')->nullable();         // Thời gian thanh toán
            $table->timestamps();                              // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}

