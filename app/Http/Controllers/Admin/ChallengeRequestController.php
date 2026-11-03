<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChallengeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChallengeRequestController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status'); // optional filter
        $type   = $request->get('type');   // optional filter

        $q = ChallengeRequest::with('ehfFighter')->orderByDesc('id');

        if ($status) $q->where('status', $status);
        if ($type)   $q->where('type', $type);

        $requests = $q->paginate(20)->withQueryString();

        return view('admin.challenge-requests.index', compact('requests', 'status', 'type'));
    }

    public function show(ChallengeRequest $challengeRequest)
    {
        $challengeRequest->load('ehfFighter');

        return view('admin.challenge-requests.show', [
            'req' => $challengeRequest
        ]);
    }

    // Update status + admin notes
    public function update(Request $request, ChallengeRequest $challengeRequest)
    {
        $data = $request->validate([
            'status'      => ['required', 'in:new,in_review,accepted,rejected,completed'],
            'admin_notes' => ['nullable', 'string'],
        ]);

        $challengeRequest->update($data);

        return redirect()
            ->route('admin.challenge-requests.show', $challengeRequest)
            ->with('success', 'Request updated successfully.');
    }

    public function destroy(ChallengeRequest $challengeRequest)
    {
        if ($challengeRequest->photo_path && Storage::disk('public')->exists($challengeRequest->photo_path)) {
            Storage::disk('public')->delete($challengeRequest->photo_path);
        }

        $challengeRequest->delete();

        return redirect()
            ->route('admin.challenge-requests.index')
            ->with('success', 'Request deleted successfully.');
    }
}
