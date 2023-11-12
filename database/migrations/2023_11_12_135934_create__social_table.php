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
        Schema::create('Social_Interaction', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable()->comment("like, comment");
            $table->foreignId('user_id')->constrained(); 
            $table->foreignId('media_id')->constrained('multimedia'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Social_Interaction');
    }
};
