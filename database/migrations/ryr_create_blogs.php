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
        Schema::create('ryrBlogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body');
            $table->string('author');
            $table->string('kategori')->default('RYR');
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
        Schema::dropIfExists('ryrBlogs');
    }
};
