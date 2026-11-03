<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UpcominFights extends Model
{
      protected $fillable = [
        'is_active','fight_date','venue','weight_class','active_until'
    ];

    public function slides()
    {
        return $this->hasMany(UpcomingFightSlide::class)->orderBy('sort_order');
    }
}
