<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\EhfFighter;
use App\Models\SiteSetting;
class EhfRosterController extends Controller
{
    public function index()
    {
        $fighters = EhfFighter::where('is_active', 1)
            ->orderBy('weight_class')
            ->orderBy('name')
            ->get();

      $fightersForJs = $fighters->map(function ($f) {
    return [
        'id'          => (string) $f->id,
        'name'        => $f->name,
        'nickname'    => $f->nickname,
        'age'         => $f->age,
        'weightKg'    => $f->weight_kg,
        'weightClass' => $f->weight_class,
        'wins'        => (int) $f->wins,
        'losses'      => (int) $f->losses,
        'draws'       => (int) $f->draws,
        'country'     => $f->country_code,
        'shortBio'    => $f->short_bio,
        'fullBio'     => $f->full_bio,
        'record' => "{$f->wins}-{$f->losses}-{$f->draws}",

        'img'         => $f->photo_path
            ? asset('storage/' . $f->photo_path)
            : asset('Front/img/defaults/fighter.png'),
    ];
})->values();
//seo
  $settings = SiteSetting::firstOrCreate(['id' => 1]);
        return view('front.EHF-fighters', compact('fightersForJs',"settings"))
        ->with('pageTitle', 'EHF Fighters — Eagle High Flyer')
        ->with('pageDesc', 'Meet the official EHF roster across all weight classes.')
        ->with('pageKeywords', 'EHF roster, MMA fighters, Eagle High Flyer fighters');
    }
}
