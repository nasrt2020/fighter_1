<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CampFighterApplication;
use App\Models\CampFighter;
use App\Models\SiteSetting;
class CampFighterRosterController extends Controller
{
     public function index()
    {
        $fighters = CampFighter::where('is_active', true)
            ->orderByDesc('id')
            ->get();

        $fightersForJs = $fighters->map(function ($f) {
            return [
                'id'       => (string) $f->id,
                'name'     => trim($f->name . ' ' . ($f->surname ?? '')),
                'age'      => (int) ($f->age ?? 0),
                'weightKg' => (int) ($f->weight_kg ?? 0),
                'img'      => $f->photo_path
                    ? asset('storage/' . $f->photo_path)
                    : asset('Front/img/defaults/fighter.png'),
            ];
        })->values();
//seo
  $settings = SiteSetting::firstOrCreate(['id' => 1]);
        return view('front.camps-fighters', compact('fightersForJs',"settings"))
        ->with('pageTitle', 'Camps Fighters — Eagle High Flyer')
        ->with('pageDesc', 'See the fighters training in our camps and applying to join EHF.')
        ->with('pageKeywords', 'MMA camps, camp fighters, training fighters');
    }
}
