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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('notelp', 13)->nullable();
            $table->string('alamat', 191)->nullable();
            $table->date('tgllahir')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('cv')->nullable();
            $table->string('sosmed')->nullable();
            $table->string('role');
            $table->string('status')->default('Belum Lengkap')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};