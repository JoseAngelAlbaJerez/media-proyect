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
        Schema::create('Playlist', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); 
            $table->string('name')->unique();
            $table->json('media_ids');
            $table->timestamps();
        });

        Schema::create('playlist_multimedia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('playlist_id')->constrained('Playlist'); // Especifica manualmente el nombre de la tabla
            $table->foreignId('multimedia_id')->constrained();
            $table->timestamps();
            
            $table->unique(['playlist_id', 'multimedia_id']); // Añade una restricción de clave única
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Playlist');
        Schema::dropIfExists('playlist_multimedia');
    }
};
