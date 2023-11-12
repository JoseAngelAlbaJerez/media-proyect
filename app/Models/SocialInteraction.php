<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialInteraction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'media_id',
        'type',
    ];
     // Relación con el usuario
     public function user()
     {
         return $this->belongsTo(User::class);
     }
 
     // Relación con el multimedia
     public function multimedia()
     {
         return $this->belongsTo(Multimedia::class, 'media_id');
     }
}
