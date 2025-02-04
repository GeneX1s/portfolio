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
            $table->string('id_member')->required();
            $table->string('nama_member')->required();
            $table->string('id_kelas')->required();
            $table->string('nama_kelas')->required();
            $table->string('tipe')->required();
            $table->text('deskripsi')->required();
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
