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
        Schema::create('copyright', function (Blueprint $table) {
            $table->id();
            $table->foreignId('media_id')->constrained('multimedia'); // Corrige aquí, elimina el punto y coma adicional
            $table->string('right_owner');
            $table->text('details_license');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Copyright');
    }
};
