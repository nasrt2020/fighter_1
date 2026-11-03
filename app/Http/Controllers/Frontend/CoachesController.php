<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coach;
use App\Models\SiteSetting;
class CoachesController extends Controller
{
    public function index()
    {
        $coaches = Coach::where('is_active', 1)
            ->orderBy('role')
            ->orderBy('name')
            ->get();

$coachesForJs = $coaches->map(function ($c) {

    // build whatsapp link
    $wa = trim((string) $c->whatsapp);
    $waLink = null;

    if ($wa !== '') {
        // if user already saved a full link like https://wa.me/..., keep it
        if (preg_match('~^https?://~i', $wa)) {
            $waLink = $wa;
        } else {
            // otherwise treat as number, clean it
            $digits = preg_replace('/\D+/', '', $wa); // keep only numbers
            if ($digits !== '') {
                $waLink = 'https://wa.me/' . $digits;
            }
        }
    }

      return [
        'id' => (string) $c->id,
        'name' => $c->name,
        'role' => $c->role,
        'experience' => (int) ($c->experience_years ?? 0),

        // ✅ THESE WERE MISSING
        'primary_specialty' => $c->primary_specialty,
        'other_specialties' => $c->other_specialties,
        'bio' => $c->bio,
        'whatsapp' => $c->whatsapp,

        'img' => $c->photo_path
            ? asset('storage/' . $c->photo_path)
            : asset('Front/img/defaults/coach.png'),
    ];
})->values();

        // ✅ IMPORTANT: your blade file name might be "couches.blade.php"
        // So match the view name to your real file:
        //seo
  $settings = SiteSetting::firstOrCreate(['id' => 1]);
        return view('front.couches', compact('coachesForJs',"settings"))
        ->with('pageTitle', 'Coaches — Eagle High Flyer')
        ->with('pageDesc', 'Meet our MMA coaches and training staff at Eagle High Flyer.')
        ->with('pageKeywords', 'MMA coaches, trainers, Eagle High Flyer staff');
        // if your file is resources/views/front/coaches.blade.php then use:
        // return view('front.coaches', compact('coachesForJs'));
    }
}
