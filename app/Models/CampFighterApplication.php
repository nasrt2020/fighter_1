<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampFighterApplication extends Model
{
  protected $fillable = [
  'name','surname','father_name','id_number',
  'age','phone','email','location','weight_kg',
  'preferred_session','discipline','experience_level','experience_years',
  'message','social_link','photo_path','status'
];

}
