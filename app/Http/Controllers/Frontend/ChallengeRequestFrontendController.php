<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ChallengeRequest;
use Illuminate\Http\Request;

class ChallengeRequestFrontendController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'ehf_fighter_id'         => ['required', 'exists:ehf_fighters,id'],
            'type'                  => ['required', 'in:challenge,sparring,booking'],

            'challenger_name'       => ['required', 'string', 'max:255'],
            'challenger_weight_kg'  => ['nullable', 'integer', 'min:0', 'max:500'],
            
            'challenger_age'  => ['nullable', 'integer', 'min:0', 'max:500'],

            'challenger_weight_class'=> ['nullable', 'string', 'max:255'],

            'record_wins'           => ['nullable', 'integer', 'min:0', 'max:999'],
            'record_losses'         => ['nullable', 'integer', 'min:0', 'max:999'],
            'record_draws'          => ['nullable', 'integer', 'min:0', 'max:999'],

            'org_name'              => ['nullable', 'string', 'max:255'],
            'contact_name'          => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'email', 'max:255'],
            'phone'                 => ['nullable', 'string', 'max:50'],
            'country'               => ['nullable', 'string', 'max:100'],
            'city'                  => ['nullable', 'string', 'max:100'],

            'preferred_date_from'   => ['nullable', 'date'],
            'preferred_date_to'     => ['nullable', 'date', 'after_or_equal:preferred_date_from'],
            'location_preference'   => ['nullable', 'string', 'max:255'],
            'profile_link'          => ['nullable', 'url', 'max:255'],
            'message'               => ['required', 'string', 'max:2000'],

            'photo'                 => ['nullable', 'image', 'max:4096'],
        ]);

        // defaults
        $data['record_wins']   = $data['record_wins']   ?? 0;
        $data['record_losses'] = $data['record_losses'] ?? 0;
        $data['record_draws']  = $data['record_draws']  ?? 0;

        // status default
        $data['status'] = 'new';

        // upload
        if ($request->hasFile('photo')) {
            $data['photo_path'] = $request->file('photo')->store('challenge-requests', 'public');
        }

        ChallengeRequest::create($data);

        return back()->with('success_challenge', 'Your request has been sent successfully. Our team will contact you soon.');
    }
}
