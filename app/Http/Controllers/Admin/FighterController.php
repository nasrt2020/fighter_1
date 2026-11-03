<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fighter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FighterController extends Controller
{
    public function index()
    {
        $fighters = Fighter::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.fighters.index', compact('fighters'));
    }

    public function create()
    {
        return view('admin.fighters.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'division'   => ['nullable', 'string', 'max:255'],
            'stance'     => ['nullable', 'string', 'max:255'],
            'wins'       => ['nullable', 'integer', 'min:0'],
            'losses'     => ['nullable', 'integer', 'min:0'],
            'draws'      => ['nullable', 'integer', 'min:0'],
            'bio'        => ['nullable', 'string'],
            'photo'      => ['nullable', 'image', 'max:2048'],
            'is_featured'=> ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('photo')) {
            $data['photo_path'] = $request->file('photo')->store('fighters', 'public');
        }

        $data['is_featured'] = $request->boolean('is_featured');

        Fighter::create($data);

        return redirect()
            ->route('admin.fighters.index')
            ->with('success', 'Fighter created successfully.');
    }

    public function edit(Fighter $fighter)
    {
        return view('admin.fighters.edit', compact('fighter'));
    }

    public function update(Request $request, Fighter $fighter)
    {
        $data = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'division'   => ['nullable', 'string', 'max:255'],
            'stance'     => ['nullable', 'string', 'max:255'],
            'wins'       => ['nullable', 'integer', 'min:0'],
            'losses'     => ['nullable', 'integer', 'min:0'],
            'draws'      => ['nullable', 'integer', 'min:0'],
            'bio'        => ['nullable', 'string'],
            'photo'      => ['nullable', 'image', 'max:2048'],
            'is_featured'=> ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('photo')) {
            // delete old if exists
            if ($fighter->photo_path) {
                Storage::disk('public')->delete($fighter->photo_path);
            }

            $data['photo_path'] = $request->file('photo')->store('fighters', 'public');
        }

        $data['is_featured'] = $request->boolean('is_featured');

        $fighter->update($data);

        return redirect()
            ->route('admin.fighters.index')
            ->with('success', 'Fighter updated successfully.');
    }

    public function destroy(Fighter $fighter)
    {
        if ($fighter->photo_path) {
            Storage::disk('public')->delete($fighter->photo_path);
        }

        $fighter->delete();

        return redirect()
            ->route('admin.fighters.index')
            ->with('success', 'Fighter deleted successfully.');
    }
    public function toggleStatus($id)
{
    $fighter = Fighter::findOrFail($id);

    $fighter->is_active = !$fighter->is_active;
    $fighter->save();

    return back()->with('success', 'Fighter status updated');
}

}
