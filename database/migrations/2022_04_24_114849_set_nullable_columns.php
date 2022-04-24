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
        Schema::table('merchants', function (Blueprint $table) {
            $table->string('address')->nullable()->change();
            $table->string('phone_number')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('account_number')->nullable()->change();
        });

        Schema::table('stores', function (Blueprint $table) {
            $table->string('display_name')->nullable()->change();
            $table->string('address')->nullable()->change();
            $table->string('phone_number')->nullable()->change();
            $table->string('email')->nullable()->change();
        });

        Schema::table('agents', function (Blueprint $table) {
            $table->string('phone_number')->nullable()->change();
            $table->string('email')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::cretableate('merchants', function (Blueprint $table) {
            $table->string('address')->change();
            $table->string('phone_number')->change();
            $table->string('email')->change();
            $table->string('account_number')->change();
        });

        Schema::table('stores', function (Blueprint $table) {
            $table->string('display_name')->change();
            $table->string('address')->change();
            $table->string('phone_number')->change();
            $table->string('email')->change();
        });

        Schema::table('agents', function (Blueprint $table) {
            $table->string('phone_number')->change();
            $table->string('email')->change();
        });
    }
};
