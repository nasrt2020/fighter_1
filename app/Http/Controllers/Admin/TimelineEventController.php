<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TimelineEvent;
use Illuminate\Http\Request;

class TimelineEventController extends Controller
{
    public function index()
    {
        $events = TimelineEvent::orderBy('sort_order')->orderBy('id')->get();
        return view('admin.timeline.index', compact('events'));
    }

    public function create()
    {
        return view('admin.timeline.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'year_label'   => ['nullable', 'string', 'max:255'],
            'title'        => ['required', 'string', 'max:255'],
            'description'  => ['nullable', 'string'],
            'image_path'   => ['nullable', 'string', 'max:255'],
            'side'         => ['required', 'in:left,right'],
            'sort_order'   => ['nullable', 'integer', 'min:0'],
            'is_active'    => ['nullable'],
        ]);

        $data['is_active'] = $request->has('is_active');

        TimelineEvent::create($data);

        return redirect()->route('admin.timeline-events.index')
            ->with('success', 'Timeline event created successfully.');
    }

    public function edit(TimelineEvent $timelineEvent)
    {
        return view('admin.timeline.edit', ['event' => $timelineEvent]);
    }

    public function update(Request $request, TimelineEvent $timelineEvent)
    {
        $data = $request->validate([
            'year_label'   => ['nullable', 'string', 'max:255'],
            'title'        => ['required', 'string', 'max:255'],
            'description'  => ['nullable', 'string'],
            'image_path'   => ['nullable', 'string', 'max:255'],
            'side'         => ['required', 'in:left,right'],
            'sort_order'   => ['nullable', 'integer', 'min:0'],
            'is_active'    => ['nullable'],
        ]);

        $data['is_active'] = $request->has('is_active');

        $timelineEvent->update($data);

        return redirect()->route('admin.timeline-events.index')
            ->with('success', 'Timeline event updated successfully.');
    }

    public function destroy(TimelineEvent $timelineEvent)
    {
        $timelineEvent->delete();

        return redirect()->route('admin.timeline-events.index')
            ->with('success', 'Timeline event deleted.');
    }
}
