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
        Schema::create('ryrMembers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_murid');
            $table->string('tipe');
            $table->date('join_date');
            $table->integer('total_attendance')->default(0);
            $table->date('dob')->nullable();
            $table->string('jenis_kelamin');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ryrMembers');
    }
};
