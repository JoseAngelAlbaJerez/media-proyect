<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'media_ids',
    ];
    // Relación con el usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación muchos a muchos con Multimedia
    public function multimedia()
    {
        return $this->belongsToMany(Multimedia::class, 'playlist_multimedia', 'playlist_id', 'multimedia_id');
    }
}
