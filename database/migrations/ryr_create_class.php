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
        Schema::create('ryr_class', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nama_kelas');
            $table->string('tipe');//public, private
            $table->string('teacher');
            $table->string('schedule');
            $table->integer('biaya');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ryr_class');
    }
};
