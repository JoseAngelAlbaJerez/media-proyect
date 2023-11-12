<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Copyright extends Model
{
    use HasFactory;

    protected $fillable = [
            'media_id',
            'right_owner',
            'details_license',
    ];

    public function multimedia (){
        return $this->belongsTo(Multimedia::class);
    }
}
    

