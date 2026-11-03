<?php


namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
class ContactController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::first(); // id=1
    return view('front.contact', compact('settings'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => ['required','string','max:255'],
            'email'   => ['required','email','max:255'],  // your form shows required
            'subject' => ['required','string','max:255'], // your form shows required
            'phone'   => ['nullable','string','max:50'],
            'message' => ['required','string','min:5'],
        ]);

        $data['ip'] = $request->ip();
        $data['user_agent'] = substr((string) $request->userAgent(), 0, 255);

        ContactMessage::create($data);

        return back()->with('success', 'Thanks! Your message has been sent.');
    }

}
