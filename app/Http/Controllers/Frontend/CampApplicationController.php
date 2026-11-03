<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CampFighterApplication;

class CampApplicationController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'age' => 'required|integer|min:10|max:80',
            'phone' => 'required|string|max:50',
            'email' => 'nullable|email|max:255',
            'location' => 'required|string|max:255',

            'weight_kg' => 'required|integer|min:30|max:250',
            'preferred_session' => 'required|in:morning,evening,both',
            'discipline' => 'required|string|max:255',
            'experience_level' => 'required|in:beginner,intermediate,pro',
            'experience_years' => 'required|integer|min:0|max:50',

            'message' => 'required|string',
            'social_link' => 'nullable|string|max:255',
'id_number' => ['required', 'string', 'regex:/^\d{4}-\d{4}-\d{5}$/'],

            'photo' => 'required|image|max:4096',
        ]);

        // upload photo
        $data['photo_path'] = $request->file('photo')->store('camp-applications', 'public');

        // default status
        $data['status'] = 'pending';

        CampFighterApplication::create($data);

        return back()->with('success', 'Your application has been submitted!');
    }
    
}
