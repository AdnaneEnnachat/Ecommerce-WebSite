<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCanceledOrdersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('canceled_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_number', 10)->unique();
            $table->string('email', 150);
            $table->string('address', 200);
            $table->string('city', 50);
            $table->string('phone');
            $table->string('fullName', 100);
            $table->float('total');
            $table->string('status')->default('canceled');
            $table->dateTime('order_date')->default(now());
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('canceled_orders');
    }
}

