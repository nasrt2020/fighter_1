<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Fighter;
use App\Models\Camp;
use App\Models\AboutContent;
use App\Models\HeroSlide;
      use App\Models\CampStat;
use App\Models\UpcomingFight;      
use App\Models\SiteSetting;
class FrontFighterController extends Controller
{
    public function index()
    {
        // Key fighters for home page
        $fighters = Fighter::where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        // Active camps for schedule section
        $camps = Camp::where('is_active', 1)
            ->where('is_active', 1)
            ->orderBy('day')
            ->orderBy('session')
            ->get()
            ->groupBy('day');   // Blade can loop by day

              // About content (take first row)
    $about = AboutContent::first();  // returns null if empty, but we seeded one
  $heroSlides = HeroSlide::where('is_active', true)
        ->orderBy('sort_order')
        ->orderBy('id')
        ->get();
  

$campStats = CampStat::first(); // could be null first time

$upcomingFight = UpcomingFight::with('slides')
    ->where('is_active', 1)
    ->where(function($q){
        $q->whereNull('active_until')
          ->orWhere('active_until', '>=', now()->toDateString());
    })
    ->first();

    //seo
  $settings = SiteSetting::firstOrCreate(['id' => 1]);
        

        return view('front.index', compact('fighters', 'camps','about', 'heroSlides','campStats',"upcomingFight","settings"
        ))->with('pageTitle', 'Home — Eagle High Flyer')
        ->with('pageDesc', 'Eagle High Flyer develops and showcases elite MMA fighters with discipline, faith, and professionalism.')
        ->with('pageKeywords', 'EHF, MMA Afghanistan, Eagle High Flyer, fighters, training');
    }

    
}
