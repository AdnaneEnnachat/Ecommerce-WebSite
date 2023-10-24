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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->string('order_numero',150);
            $table->unsignedBigInteger('product_id');
            $table->integer('quantite');
            $table->float('price');
            $table->foreign('order_numero')->references('numero')->on('orders')->onDelete("cascade");
            $table->foreign('product_id')->references('id')->on('products')->onDelete("cascade");


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
