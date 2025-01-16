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
            $table->uuid('id')->primary();
            $table->string('product_name');
            $table->integer('product_price');
            $table->integer('available_stock');
            $table->text('description');
            $table->string('image_path');
            $table->unsignedBigInteger('category_id');
            $table->uuid('user_id');
            $table->softDeletes();
            $table->timestamps();
        });
        // Schema::table('products', function(Blueprint $table){
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
