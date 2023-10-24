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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nameProduct',100);
            $table->float('prix');
            $table->text('description');
            $table->integer('quantiteStock');
            $table->string('status',50)->default('En stock');
            $table->string('category_name',50);
            $table->foreign('category_name')->references('name')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('image',100);
            $table->string('slug')->unique();
            $table->string('paiment')->default('cash on delivery');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
