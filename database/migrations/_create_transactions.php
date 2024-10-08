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
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('nominal');
            $table->string('kategori');
            $table->string('sub_kategori')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('status')->nullable();
            $table->string('profile')->nullable();
            $table->string('balance');
            $table->string('balance_destination')->nullable();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
