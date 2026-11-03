<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoachController extends Controller
{
    public function index()
    {
        $coaches = Coach::orderByDesc('id')->paginate(20);
        return view('admin.coaches.index', compact('coaches'));
    }

    public function create()
    {
        return view('admin.coaches.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'role' => ['nullable','string','max:255'],
            'experience_years' => ['nullable','integer','min:0','max:80'],
            'primary_specialty' => ['nullable','string','max:255'],
            'other_specialties' => ['nullable','string','max:500'],
            'bio' => ['nullable','string'],
            'phone' => ['nullable','string','max:50'],
            'email' => ['nullable','email','max:255'],
            'whatsapp' => ['nullable','string','max:255'],
            'photo' => ['nullable','image','max:4096'],
            'is_active' => ['nullable'],
        ]);

        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('photo')) {
            $data['photo_path'] = $request->file('photo')->store('coaches', 'public');
        }

        Coach::create($data);

        return redirect()->route('admin.coaches.index')->with('success','Coach created.');
    }

    public function edit(Coach $coach)
    {
        return view('admin.coaches.edit', compact('coach'));
    }

    public function update(Request $request, Coach $coach)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'role' => ['nullable','string','max:255'],
            'experience_years' => ['nullable','integer','min:0','max:80'],
            'primary_specialty' => ['nullable','string','max:255'],
            'other_specialties' => ['nullable','string','max:500'],
            'bio' => ['nullable','string'],
            'phone' => ['nullable','string','max:50'],
            'email' => ['nullable','email','max:255'],
            'whatsapp' => ['nullable','string','max:255'],
            'photo' => ['nullable','image','max:4096'],
            'is_active' => ['nullable'],
        ]);

        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('photo')) {
            if ($coach->photo_path && Storage::disk('public')->exists($coach->photo_path)) {
                Storage::disk('public')->delete($coach->photo_path);
            }
            $data['photo_path'] = $request->file('photo')->store('coaches', 'public');
        }

        $coach->update($data);

        return redirect()->route('admin.coaches.index')->with('success','Coach updated.');
    }

    public function destroy(Coach $coach)
    {
        if ($coach->photo_path && Storage::disk('public')->exists($coach->photo_path)) {
            Storage::disk('public')->delete($coach->photo_path);
        }

        $coach->delete();

        return redirect()->route('admin.coaches.index')->with('success','Coach deleted.');
    }
    public function show(Coach $coach)
{
    return view('admin.coaches.show', compact('coach'));
}

public function toggle(Coach $coach)
{
    $coach->update([
        'is_active' => !$coach->is_active
    ]);

    return back()->with('success', 'Coach status updated.');
}

}
