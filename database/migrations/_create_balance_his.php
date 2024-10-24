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
        Schema::create('balance_his', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id');
            $table->string('balance_name');
            $table->integer('saldo_before');
            $table->integer('saldo_after');
            $table->string('description')->default('.');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balance_his');
    }
};
