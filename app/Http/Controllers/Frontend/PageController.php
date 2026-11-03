<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutContent;
use App\Models\TimelineEvent;
use App\Models\TeamMember;
use App\Models\SiteSetting;
class PageController extends Controller
{
   public function about()
{
    $about = AboutContent::first();
$timelineEvents = TimelineEvent::where('is_active', true)
        ->orderBy('sort_order')
        ->orderBy('id')
        ->get();

    $teamOwner = TeamMember::where('is_active', true)
        ->where('is_owner', true)
        ->orderBy('sort_order')
        ->first();

    $teamMembers = TeamMember::where('is_active', true)
        ->where('is_owner', false)
        ->orderBy('sort_order')
        ->get();

        
//seo
  $settings = SiteSetting::firstOrCreate(['id' => 1]);
    return view('front.about', compact(
        'about',
        'timelineEvents',
        'teamOwner',
        'teamMembers',"settings"
    )) ->with('pageTitle', 'About — Eagle High Flyer')
        ->with('pageDesc', 'Learn about Eagle High Flyer, our mission, training philosophy, and fighter development.')
        ->with('pageKeywords', 'about EHF, MMA organization, fighters development');
}

}
