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
        Schema::create('ryrTeachers', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('salary');
            $table->date('join_date')->default(now());
            $table->date('dob')->nullable();
            $table->string('jenis_kelamin');
            $table->text('deskripsi')->nullable();
            $table->text('instagram')->nullable();
            $table->string('status')->default('Active');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ryrTeachers');
    }
};
