<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EhfFighter extends Model
{
    protected $fillable = [
    'name','nickname','age','weight_kg','weight_class',
    'wins','losses','draws','country_code',
    'short_bio','full_bio',
    'photo_path','is_active'
];

public function challengeRequests()
{
    return $this->hasMany(ChallengeRequest::class);
}

}
