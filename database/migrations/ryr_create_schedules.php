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
        Schema::create('ryr_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('class_id'); //OKTA_060225
            $table->string('class_name');
            $table->string('teacher_name');
            $table->string('tipe');// public / private
            $table->string('status');
            $table->string('harga');
            $table->date('tanggal');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ryr_schedules');
    }
};
