<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Camp;
use Illuminate\Http\Request;

class CampController extends Controller
{
    public function index()
    {
        $camps = Camp::orderBy('day')->orderBy('session')->get();

        return view('admin.camps.index', compact('camps'));
    }

    public function create()
    {
        return view('admin.camps.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'day'        => 'required|string|max:50',
            'session'    => 'required|in:morning,evening',
            'title'      => 'required|string|max:255',
            'start_time' => 'required',
            'end_time'   => 'required',
            'is_active'  => 'nullable|boolean',
        ]);
    

        $data['is_active'] = $request->has('is_active');

        Camp::create($data);

        return redirect()
            ->route('admin.camps.index')
            ->with('success', 'Camp session created successfully.');
    }

    public function edit(Camp $camp)
    {
        return view('admin.camps.edit', compact('camp'));
    }

    public function update(Request $request, Camp $camp)
    {
        $data = $request->validate([
            'day'        => 'required|string|max:50',
            'session'    => 'required|in:morning,evening',
            'title'      => 'required|string|max:255',
            'start_time' => 'required',
            'end_time'   => 'required',
            'is_active'  => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->has('is_active');

        $camp->update($data);

        return redirect()
            ->route('admin.camps.index')
            ->with('success', 'Camp session updated successfully.');
    }

    public function destroy(Camp $camp)
    {
        $camp->delete();

        return redirect()
            ->route('admin.camps.index')
            ->with('success', 'Camp session deleted successfully.');
    }
}
