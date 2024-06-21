<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 
     * Run the migrations.
     * 
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('brand_id')->nullable();
            $table->bigInteger('shop_id')->nullable();
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('price')->nullable();
            $table->string('code')->nullable();
            $table->integer('priority')->nullable();
            $table->string('rating')->nullable();
            $table->string('condition')->nullable();
            $table->string('source')->nullable();
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
