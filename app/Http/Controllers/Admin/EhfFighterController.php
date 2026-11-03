<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EhfFighter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EhfFighterController extends Controller
{
    public function index()
    {
        $fighters = EhfFighter::orderByDesc('id')->paginate(20);
        return view('admin.ehf-fighters.index', compact('fighters'));
    }

    public function create()
    {
        return view('admin.ehf-fighters.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => ['required','string','max:255'],
            'nickname'    => ['nullable','string','max:255'],
            'age'         => ['nullable','integer','min:0','max:120'],
            'weight_kg'   => ['nullable','integer','min:0','max:500'],
            'weight_class'=> ['nullable','string','max:255'],
            'wins'        => ['nullable','integer','min:0'],
            'losses'      => ['nullable','integer','min:0'],
            'draws'       => ['nullable','integer','min:0'],
            'country_code'=> ['nullable','string','size:2'],
            'short_bio'   => ['nullable','string'],
            'full_bio'    => ['nullable','string'],
            'photo'       => ['nullable','image','max:4096'],
            'is_active'   => ['nullable'],
        ]);

        // checkbox fix
        $data['is_active'] = $request->has('is_active');

        // defaults if empty
        $data['wins']   = $data['wins']   ?? 0;
        $data['losses'] = $data['losses'] ?? 0;
        $data['draws']  = $data['draws']  ?? 0;

        // upload image
        if ($request->hasFile('photo')) {
            $data['photo_path'] = $request->file('photo')->store('ehf-fighters', 'public');
        }

        EhfFighter::create($data);

        return redirect()->route('admin.ehf-fighters.index')
            ->with('success', 'Fighter created successfully.');
    }

    public function edit(EhfFighter $ehf_fighter)
    {
        return view('admin.ehf-fighters.edit', ['fighter' => $ehf_fighter]);
    }

    public function update(Request $request, EhfFighter $ehf_fighter)
    {
        $data = $request->validate([
            'name'        => ['required','string','max:255'],
            'nickname'    => ['nullable','string','max:255'],
            'age'         => ['nullable','integer','min:0','max:120'],
            'weight_kg'   => ['nullable','integer','min:0','max:500'],
            'weight_class'=> ['nullable','string','max:255'],
            'wins'        => ['nullable','integer','min:0'],
            'losses'      => ['nullable','integer','min:0'],
            'draws'       => ['nullable','integer','min:0'],
            'country_code'=> ['nullable','string','size:2'],
            'short_bio'   => ['nullable','string'],
            'full_bio'    => ['nullable','string'],
            'photo'       => ['nullable','image','max:4096'],
            'is_active'   => ['nullable'],
        ]);

        $data['is_active'] = $request->has('is_active');

        $data['wins']   = $data['wins']   ?? 0;
        $data['losses'] = $data['losses'] ?? 0;
        $data['draws']  = $data['draws']  ?? 0;

        if ($request->hasFile('photo')) {
            // delete old
            if ($ehf_fighter->photo_path && Storage::disk('public')->exists($ehf_fighter->photo_path)) {
                Storage::disk('public')->delete($ehf_fighter->photo_path);
            }
            $data['photo_path'] = $request->file('photo')->store('ehf-fighters', 'public');
        }

        $ehf_fighter->update($data);

        return redirect()->route('admin.ehf-fighters.index')
            ->with('success', 'Fighter updated successfully.');
    }

    public function destroy(EhfFighter $ehf_fighter)
    {
        if ($ehf_fighter->photo_path && Storage::disk('public')->exists($ehf_fighter->photo_path)) {
            Storage::disk('public')->delete($ehf_fighter->photo_path);
        }

        $ehf_fighter->delete();

        return redirect()->route('admin.ehf-fighters.index')
            ->with('success', 'Fighter deleted successfully.');
    }
}
