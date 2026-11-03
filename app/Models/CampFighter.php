<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampFighter extends Model
{
    protected $fillable = [
        'application_id', // ✅ ADD THIS
        'name','surname','father_name',
        'age','phone','email','location',
        'weight_kg','preferred_session',
        'discipline','experience_level','experience_years',
        'message','social_link',
        'photo_path','is_active',
    ];
}
