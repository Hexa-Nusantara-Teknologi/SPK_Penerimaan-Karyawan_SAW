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
        Schema::create('ranking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_activity_id')->constrained('user_activity')->onDelete('cascade');
            $table->enum('status', ['Lolos', 'Tidak Lolos']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ranking');
    }
};
