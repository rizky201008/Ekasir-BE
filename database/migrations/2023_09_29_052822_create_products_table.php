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
            $table->string("name");
            $table->string("image")->default('https://cdn.pixabay.com/photo/2023/09/25/15/59/pumpkin-8275473_640.jpg');
            $table->string("description")->default('-');
            $table->integer("price1");
            $table->integer("l1")->default(0);
            $table->integer("price2")->nullable();
            $table->integer("l2")->default(0);
            $table->integer("price3")->nullable();
            $table->integer("l3")->default(0);
            $table->integer("stock")->default(0);
            $table->foreignId('category_id');
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
