<?php

// app/Http/Controllers/Admin/CampStatController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CampStat;
use Illuminate\Http\Request;

class CampStatController extends Controller
{
    public function edit()
    {
        $stats = CampStat::firstOrCreate([]);
        return view('admin.camp-stats.edit', compact('stats'));
    }

    public function update(Request $request)
    {
        $stats = CampStat::firstOrCreate([]);

        $data = $request->validate([
            'fighters_trained' => ['required','integer','min:0'],
            'pro_fights_won'   => ['required','integer','min:0'],
            'years_of_camps'   => ['required','integer','min:0'],
        ]);

        $stats->update($data);

        return back()->with('success', 'Camp stats updated.');
    }
}
