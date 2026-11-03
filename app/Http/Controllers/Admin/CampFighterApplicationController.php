<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CampFighter;
use App\Models\CampFighterApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CampFighterApplicationController extends Controller
{
    public function index()
    {
        $applications = CampFighterApplication::orderByRaw("
                CASE status
                    WHEN 'pending' THEN 1
                    WHEN 'approved' THEN 2
                    WHEN 'rejected' THEN 3
                    ELSE 4
                END
            ")
            ->orderByDesc('id')
            ->paginate(20);

        return view('admin.camp-applications.index', compact('applications'));
    }

    public function show(CampFighterApplication $campApplication)
    {
        return view('admin.camp-applications.show', compact('campApplication'));
    }

    public function edit(CampFighterApplication $campApplication)
    {
        return view('admin.camp-applications.edit', compact('campApplication'));
    }

    public function update(Request $request, CampFighterApplication $campApplication)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'surname' => ['nullable','string','max:255'],
            'father_name' => ['nullable','string','max:255'],
            'age' => ['nullable','integer','min:0','max:120'],
            'phone' => ['nullable','string','max:50'],
            'email' => ['nullable','email','max:255'],
            'location' => ['nullable','string','max:255'],
              'id_number' => ['nullable', 'string', 'max:50'],
            'weight_kg' => ['nullable','integer','min:0','max:500'],
            'preferred_session' => ['nullable','in:morning,evening,both'],
            'discipline' => ['nullable','string','max:255'],
            'experience_level' => ['nullable','in:beginner,intermediate,pro'],
            'experience_years' => ['nullable','integer','min:0','max:80'],
            'message' => ['nullable','string'],
            'social_link' => ['nullable','string','max:500'],
            'status' => ['required','in:pending,approved,rejected'],
        ]);

        $campApplication->update($data);

        return redirect()->route('admin.camp-applications.index')
            ->with('success', 'Application updated successfully.');
    }

    public function destroy(CampFighterApplication $campApplication)
    {
        $campApplication->delete();

        return redirect()->route('admin.camp-applications.index')
            ->with('success', 'Application deleted.');
    }

    // ✅ APPROVE: copy data into camp_fighters and mark approved
public function approve(CampFighterApplication $campApplication)
{
    if ($campApplication->status === 'approved') {
        return back()->with('success', 'Already approved.');
    }

    DB::transaction(function () use ($campApplication) {

        CampFighter::updateOrCreate(
            ['application_id' => $campApplication->id], // ✅ unique link
            [
                'name' => $campApplication->name,
                'surname' => $campApplication->surname,
                'father_name' => $campApplication->father_name,
                'age' => $campApplication->age,
                'phone' => $campApplication->phone,
                'email' => $campApplication->email,
                'location' => $campApplication->location,
                'weight_kg' => $campApplication->weight_kg,
                'preferred_session' => $campApplication->preferred_session,
                'discipline' => $campApplication->discipline,
                'experience_level' => $campApplication->experience_level,
                'experience_years' => $campApplication->experience_years,
                'message' => $campApplication->message,
                'social_link' => $campApplication->social_link,
                'photo_path' => $campApplication->photo_path,
                'is_active' => 1, // ✅ force active
            ]
        );

        $campApplication->update(['status' => 'approved']);
    });

    return redirect()->route('admin.camp-applications.index')
        ->with('success', 'Approved + added to Campus Fighters.');
}


public function reject(CampFighterApplication $campApplication)
{
    DB::transaction(function () use ($campApplication) {

        $campApplication->update(['status' => 'rejected']);

        // ✅ deactivate fighter row
        CampFighter::where('application_id', $campApplication->id)
            ->update(['is_active' => 0]);
    });

    return redirect()->route('admin.camp-applications.index')
        ->with('success', 'Deactivated and removed from Camp Fighters page.');
}


}
