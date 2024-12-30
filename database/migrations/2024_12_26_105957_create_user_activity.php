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
        Schema::create('user_activity', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->float('criteria_1')->nullable();
            $table->float('criteria_2')->nullable();
            $table->float('criteria_3')->nullable();
            $table->float('criteria_4')->nullable();
            $table->float('criteria_5')->nullable();
            $table->float('criteria_6')->nullable();
            $table->boolean('status_text');
            $table->float('score')->nullable();
            $table->timestamp('start_time')->useCurrent();;
            $table->timestamp('end_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_activity');
    }
};