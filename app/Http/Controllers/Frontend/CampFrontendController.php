<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Camp;

class CampFrontendController extends Controller
{
    public function index()
    {
        // Get only active sessions
        $camps = Camp::where('is_active', 1)
                     ->orderBy('day')
                     ->orderBy('session')
                     ->get()
                     ->groupBy('day');

        return view('front.index', compact('camps'));
    }
}
