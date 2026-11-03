<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutContent extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_text',
        'stat_fighters_trained',
        'stat_pro_fights_won',
        'stat_years_of_camps',
        'vision_title',
        'vision_text',
        'vision_video_url',
        'hero_image',
        'vision_image',
    ];
}
