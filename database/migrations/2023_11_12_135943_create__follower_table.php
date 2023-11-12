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
        Schema::create('follower', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Usuario que sigue
            $table->foreignId('following_id')->constrained('users'); // Usuario que está siendo seguido
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('follower');
    }
};
