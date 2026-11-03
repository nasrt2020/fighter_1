<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutContent;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function edit()
    {
        // always work with the first (and only) AboutContent row
        $about = AboutContent::first();

        // if none exists (for some reason), create a blank one
        if (!$about) {
            $about = AboutContent::create([]);
        }

        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $about = AboutContent::first();

        if (!$about) {
            $about = AboutContent::create([]);
        }

        $validated = $request->validate([
            'hero_title'            => ['nullable', 'string', 'max:255'],
            'hero_text'             => ['nullable', 'string'],
            'stat_fighters_trained' => ['nullable', 'integer', 'min:0'],
            'stat_pro_fights_won'   => ['nullable', 'integer', 'min:0'],
            'stat_years_of_camps'   => ['nullable', 'integer', 'min:0'],
            'vision_title'          => ['nullable', 'string', 'max:255'],
            'vision_text'           => ['nullable', 'string'],
            'vision_video_url'      => ['nullable', 'string', 'max:255'],
            'hero_image'            => ['nullable', 'string', 'max:255'],
            'vision_image'          => ['nullable', 'string', 'max:255'],
        ]);

        $about->update($validated);

        return redirect()
            ->route('admin.about.edit')
            ->with('success', 'About content updated successfully.');
    }
}
