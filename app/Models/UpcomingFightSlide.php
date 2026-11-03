<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UpcomingFightSlide extends Model
{
    protected $fillable = [
        'upcoming_fight_id','sort_order',
        'fighter1_name','fighter1_record','fighter1_flag','fighter1_image',
        'fighter1_age','fighter1_height','fighter1_weight','fighter1_reach',
        'fighter2_name','fighter2_record','fighter2_flag','fighter2_image',
        'fighter2_age','fighter2_height','fighter2_weight','fighter2_reach',
    ];
}
