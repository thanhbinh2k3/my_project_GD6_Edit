<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePlansTableAddNullableDuration extends Migration
{
    public function up()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->integer('duration_days')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->integer('duration_days')->nullable(false)->change();
        });
    }
}
