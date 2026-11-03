<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::latest()->paginate(15);

        return view('admin.application.index', compact('applications'));
    }

    public function show(Application $application)
    {
        return view('admin.application.show', compact('application'));
    }

    public function update(Request $request, Application $application)
    {
        $data = $request->validate([
            'status' => 'required|in:pending,reviewed,accepted,rejected',
        ]);

        $application->update($data);

        return back()->with('success', 'Application status updated.');
    }

    public function destroy(Application $application)
    {
        $application->delete();

        return redirect()
            ->route('admin.applications.index')
            ->with('success', 'Application deleted.');
    }
}
