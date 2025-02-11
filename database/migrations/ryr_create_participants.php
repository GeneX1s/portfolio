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
        Schema::create('ryr_participants', function (Blueprint $table) {
            $table->id();
            $table->string('id_member')->nullable();//bisa aja murid baru atau temporary
            $table->string('nama_member')->nullable();
            $table->string('id_kelas')->required();
            $table->string('nama_kelas')->required();
            $table->string('tipe')->required();//temporary atau member
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ryr_participants');
    }
};
