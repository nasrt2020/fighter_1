<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Fighter;
use App\Models\Camp;

class FrontFighterController extends Controller
{
    public function index()
    {
        $fighters = Fighter::where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $camps = Camp::where('is_active', 1)
            ->orderBy('day')
            ->orderBy('session')
            ->get()
            ->groupBy('day');

        return view('frontend.home', compact('fighters', 'camps'));
    }
}
