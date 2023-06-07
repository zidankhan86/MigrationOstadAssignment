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
            $table->string('tittle',50);
            $table->string('short_des',50);
            $table->string('price',50);
            $table->boolean('discount',50);
            $table->string('discount_price',50);
            $table->string('image',50);
            $table->boolean('stock',50);
            $table->float('star',50);
            $table->enum('remark',['popular','new','top','trending','special']);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('category_id')->references('id')->on('categories')
            ->restrictOnDelete()
            ->cascadeOnUpdate();
            $table->foreign('brand_id')->references('id')->on('brands')
            ->restrictOnDelete()
            ->restrictOnUpdate();
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
