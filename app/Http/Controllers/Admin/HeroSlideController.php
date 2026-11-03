<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use Illuminate\Http\Request;

class HeroSlideController extends Controller
{
    public function index()
    {
        $slides = HeroSlide::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.hero-slides.index', compact('slides'));
    }

    public function create()
    {
        $slide = new HeroSlide();
        return view('admin.hero-slides.create', compact('slide'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        // upload image if present
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')
                ->store('hero-slides', 'public'); // storage/app/public/hero-slides
        }

        $data['is_active'] = $request->has('is_active');

        HeroSlide::create($data);

        return redirect()->route('admin.hero-slides.index')
            ->with('success', 'Slide created successfully.');
    }

    public function edit(HeroSlide $heroSlide)
    {
        $slide = $heroSlide;
        return view('admin.hero-slides.edit', compact('slide'));
    }

    public function update(Request $request, HeroSlide $heroSlide)
    {
        $data = $this->validateData($request);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')
                ->store('hero-slides', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        $heroSlide->update($data);

        return redirect()->route('admin.hero-slides.index')
            ->with('success', 'Slide updated successfully.');
    }

    public function destroy(HeroSlide $heroSlide)
    {
        $heroSlide->delete();

        return redirect()->route('admin.hero-slides.index')
            ->with('success', 'Slide deleted.');
    }

    protected function validateData(Request $request): array
    {
        return $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'subtitle'    => ['nullable', 'string', 'max:255'],
            'button_text' => ['nullable', 'string', 'max:255'],
            'button_link' => ['nullable', 'string', 'max:255'],
            'overlay'     => ['nullable', 'integer', 'min:0', 'max:9'],
            'sort_order'  => ['nullable', 'integer', 'min:0'],
            'image'       => ['nullable', 'image', 'max:2048'], // 2MB
        ]);
    }
}
