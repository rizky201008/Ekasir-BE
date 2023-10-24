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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('total');
            $table->enum('payment_status',['lunas','hutang']);
            $table->enum('transaction_status',['proses','terkirim','selesai','batal'])->default('proses');
            $table->integer('payment_amount');
            $table->integer('change_amount')->default(0);
            $table->enum('payment_method',['transfer','cash']);
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
