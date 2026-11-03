<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $fillable = [
        'name',
        'role',
        'experience_years',
        'primary_specialty',
        'other_specialties',
        'bio',
        'phone',
        'email',
        'whatsapp',
        'photo_path',
        'is_active', // add this column if you want deactivate feature
    ];
}
