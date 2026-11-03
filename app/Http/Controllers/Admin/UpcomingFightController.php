<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UpcomingFight;
use App\Models\UpcomingFightSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpcomingFightController extends Controller
{
    public function edit()
    {
        // single record (id=1)
        $fight = UpcomingFight::firstOrCreate(['id' => 1]);
        $fight->load('slides');

        return view('admin.upcomingfights.upcoming_fight', compact('fight'));
    }

    public function update(Request $request)
    {
        $fight = UpcomingFight::firstOrCreate(['id' => 1]);

        $data = $request->validate([
            'is_active'     => 'nullable|boolean',
            'fight_date'    => 'nullable|date',
            'venue'         => 'nullable|string|max:255',
            'weight_class'  => 'nullable|string|max:255',
            'active_until'  => 'nullable|date',
        ]);

        // checkbox fix
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $fight->update($data);

        return back()->with('success', 'Upcoming fight settings updated.');
    }

    public function storeSlide(Request $request)
    {
        $fight = UpcomingFight::firstOrCreate(['id' => 1]);

        $data = $request->validate([
            'fighter1_name'   => 'nullable|string|max:255',
            'fighter1_record' => 'nullable|string|max:50',
            'fighter1_flag'   => 'nullable|string|max:10',
            'fighter1_age'    => 'nullable|integer|min:0|max:99',
            'fighter1_height' => 'nullable|string|max:50',
            'fighter1_weight' => 'nullable|string|max:50',
            'fighter1_reach'  => 'nullable|string|max:50',
            'fighter1_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'fighter2_name'   => 'nullable|string|max:255',
            'fighter2_record' => 'nullable|string|max:50',
            'fighter2_flag'   => 'nullable|string|max:10',
            'fighter2_age'    => 'nullable|integer|min:0|max:99',
            'fighter2_height' => 'nullable|string|max:50',
            'fighter2_weight' => 'nullable|string|max:50',
            'fighter2_reach'  => 'nullable|string|max:50',
            'fighter2_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'sort_order'      => 'nullable|integer|min:0|max:9999',
        ]);

        $slide = new UpcomingFightSlide();
        $slide->upcoming_fight_id = $fight->id;

        // fill normal fields except images
        $slide->fill(collect($data)->except(['fighter1_image','fighter2_image'])->toArray());

        // upload images
        if ($request->hasFile('fighter1_image')) {
            $slide->fighter1_image = $request->file('fighter1_image')->store('upcoming-fights', 'public');
        }
        if ($request->hasFile('fighter2_image')) {
            $slide->fighter2_image = $request->file('fighter2_image')->store('upcoming-fights', 'public');
        }

        $slide->save();

        return back()->with('success', 'Slide added.');
    }

    public function deleteSlide(UpcomingFightSlide $slide)
    {
        // delete images from storage
        if ($slide->fighter1_image && Storage::disk('public')->exists($slide->fighter1_image)) {
            Storage::disk('public')->delete($slide->fighter1_image);
        }
        if ($slide->fighter2_image && Storage::disk('public')->exists($slide->fighter2_image)) {
            Storage::disk('public')->delete($slide->fighter2_image);
        }

        $slide->delete();

        return back()->with('success', 'Slide deleted.');
    }
}
