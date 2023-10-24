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
        Schema::create('orders', function (Blueprint $table) {
            $table->string('numero',10)->primary();
            $table->string('email',150);
            $table->string('adresse',200);
            $table->string('ville',50);
            $table->string('phone');
            $table->string('fullName',100);
            $table->float('total');
            $table->string('status')->default('pending');
            $table->dateTime('oder_date')->default(now());
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
