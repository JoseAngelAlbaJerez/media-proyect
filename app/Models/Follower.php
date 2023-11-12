<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'following_id'
    ];

      // Relación con el usuario que sigue
      public function user()
      {
          return $this->belongsTo(User::class, 'user_id');
      }
  
      // Relación con el usuario que está siendo seguido
      public function following()
      {
          return $this->belongsTo(User::class, 'following_id');
      }
}
