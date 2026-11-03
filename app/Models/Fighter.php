<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fighter extends Model
{
      protected $fillable = [
        'name',
        'division',
        'stance',
       'wins'  ,
    'losses',
    'draws'  ,
        'photo_path',
        'bio',
        'is_featured',
            'is_active', // ✅ add this
    ];
}
