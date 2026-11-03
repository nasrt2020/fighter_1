<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        $members = TeamMember::orderBy('is_owner', 'desc')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.team-members.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team-members.create');
    }

   public function store(Request $request)
{
    $data = $request->validate([
        'name'       => ['required', 'string', 'max:255'],
        'role'       => ['nullable', 'string', 'max:255'],
        'note'       => ['nullable', 'string'],
        'photo'      => ['nullable', 'image', 'max:2048'], // NEW
        'sort_order' => ['nullable', 'integer', 'min:0'],
        'is_owner'   => ['nullable'],
        'is_active'  => ['nullable'],
    ]);

    // Handle photo upload
    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = time() . '_' . $file->getClientOriginalName();

        // save under /public/uploads/team/
        $file->move(public_path('uploads/team/'), $filename);

        $data['photo_path'] = 'uploads/team/' . $filename;
    }

    $data['is_owner']  = $request->has('is_owner');
    $data['is_active'] = $request->has('is_active');

    TeamMember::create($data);

    return redirect()->route('admin.team-members.index')
        ->with('success', 'Team member created successfully.');
}


    public function edit(TeamMember $teamMember)
    {
        return view('admin.team-members.edit', ['member' => $teamMember]);
    }

   public function update(Request $request, TeamMember $teamMember)
{
    $data = $request->validate([
        'name'       => ['required', 'string', 'max:255'],
        'role'       => ['nullable', 'string', 'max:255'],
        'note'       => ['nullable', 'string'],
        'photo'      => ['nullable', 'image', 'max:2048'], // NEW
        'sort_order' => ['nullable', 'integer', 'min:0'],
        'is_owner'   => ['nullable'],
        'is_active'  => ['nullable'],
    ]);

    // If user uploads a new photo, replace the old one
    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = time() . '_' . $file->getClientOriginalName();

        $file->move(public_path('uploads/team/'), $filename);

        $data['photo_path'] = 'uploads/team/' . $filename;

        // Delete old file if exists
        if ($teamMember->photo_path && file_exists(public_path($teamMember->photo_path))) {
            @unlink(public_path($teamMember->photo_path));
        }
    }

    $data['is_owner']  = $request->has('is_owner');
    $data['is_active'] = $request->has('is_active');

    $teamMember->update($data);

    return redirect()->route('admin.team-members.index')
        ->with('success', 'Team member updated successfully.');
}


    public function destroy(TeamMember $teamMember)
    {
        $teamMember->delete();

        return redirect()->route('admin.team-members.index')
            ->with('success', 'Team member deleted.');
    }
}
