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
        'category_id',
        'filepath',
    ];
   public function user()
   {
       return $this->belongsTo(User::class);
   }

   public function playlists()
   {
       return $this->belongsToMany(Playlist::class, 'playlist_multimedia', 'multimedia_id', 'playlist_id');
   }

   public function socialInteractions()
   {
       return $this->hasMany(SocialInteraction::class, 'media_id');
   }

   public function copyright()
   {
       return $this->hasOne(Copyright::class, 'media_id');
   }
  public function getPath()
    {
        $url = 'uploads/'.$this->file_path;
        return $url;
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
    
}
