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
        Schema::create('ryrClasses', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nama_kelas');
            $table->string('tipe'); //public, private
            $table->string('teacher');
            $table->string('day');
            $table->string('schedule');
            $table->time('start_time')->default('08:00:00');
            $table->time('end_time')->default('17:00:00');
            $table->integer('biaya');
            $table->text('description');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ryrClasses');
    }
};
