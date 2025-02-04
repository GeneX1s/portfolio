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
            $table->string('class_id');//OKTA_060225
            $table->string('class_name');
            $table->string('member_id');
            $table->string('member_name');
            $table->string('status');
            $table->date('tanggal');
            $table->string('payment_type');
            $table->string('payment_status');
            $table->text('description');
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
