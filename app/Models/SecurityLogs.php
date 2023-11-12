<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecurityLogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'register_type',
        'register_details',
        'IPAdress'
        
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
