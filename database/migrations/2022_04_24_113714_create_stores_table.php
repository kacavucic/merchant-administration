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
        Schema::create('stores', function (Blueprint $table) {
            $table->string('store_code')->unique();
            $table->string('merchant_code');
            $table->string('display_name');
            $table->string('address');
            $table->string('phone_number');
            $table->string('email');
            $table->timestamps();
            $table->foreign('merchant_code')->references('merchant_code')->on('merchants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
};
