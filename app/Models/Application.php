<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'age',
        'nationality',
        'weight_class',
        'experience',
        'status',
    ];
}
