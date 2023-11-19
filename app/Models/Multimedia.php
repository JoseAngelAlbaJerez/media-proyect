<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'category',
        'filepath',
    ];
   // Relación con el usuario
   public function user()
   {
       return $this->belongsTo(User::class);
   }

   // Relación muchos a muchos con Playlist
   public function playlists()
   {
       return $this->belongsToMany(Playlist::class, 'playlist_multimedia', 'multimedia_id', 'playlist_id');
   }

   // Relación uno a muchos con SocialInteraction
   public function socialInteractions()
   {
       return $this->hasMany(SocialInteraction::class, 'media_id');
   }

   // Relación uno a uno con Copyright
   public function copyright()
   {
       return $this->hasOne(Copyright::class, 'media_id');
   }
  public function getPath()
    {
        $url = 'uploads/'.$this->file_path;
        return $url;
    }
    
}
