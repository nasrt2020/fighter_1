<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function edit()
    {
        $settings = SiteSetting::firstOrCreate(['id' => 1]);
        return view('admin.settings.contact', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = SiteSetting::firstOrCreate(['id' => 1]);

        $data = $request->validate([
            'phone_1' => 'nullable|string|max:50',
            'phone_2' => 'nullable|string|max:50',
            'email_1' => 'nullable|email|max:150',
            'email_2' => 'nullable|email|max:150',
            'address_line_1' => 'nullable|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'map_iframe_src' => 'nullable|string',

            'footer_about_text' => 'nullable|string',
            'footer_address' => 'nullable|string|max:255',
            'footer_email' => 'nullable|string|max:255',
            'footer_website' => 'nullable|string|max:255',
            'footer_phone' => 'nullable|string|max:255',

            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',

            'footer_copy' => 'nullable|string|max:255',

            // file
            'footer_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

             'top_phone' => 'nullable|string|max:50',
    'top_email' => 'nullable|email|max:150',
    'show_topbar' => 'nullable|boolean',

    'top_facebook_url' => 'nullable|url|max:255',
    'top_youtube_url'  => 'nullable|url|max:255',
    'top_instagram_url'=> 'nullable|url|max:255',

    //seo
     'seo_site_title' => 'nullable|string|max:255',
    'seo_site_description' => 'nullable|string|max:500',
    'seo_default_og_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    'seo_keywords' => 'nullable|string',

        ]);
        $data['show_topbar'] = $request->has('show_topbar') ? 1 : 0;


        // ✅ 1) Update normal fields (EXCLUDE footer_logo)
        unset($data['footer_logo']);
        $settings->update($data);

        // ✅ 2) Upload logo if provided
        if ($request->hasFile('footer_logo')) {

            // delete old logo
            if (!empty($settings->footer_logo) && Storage::disk('public')->exists($settings->footer_logo)) {
                Storage::disk('public')->delete($settings->footer_logo);
            }

            // store new logo
            $path = $request->file('footer_logo')->store('site', 'public'); // storage/app/public/site/...
            $settings->footer_logo = $path;
            $settings->save();
        }

        //seo
// 2) update non-file fields
unset($data['seo_default_og_image']);
$settings->update($data);

// 3) upload seo image if provided
if ($request->hasFile('seo_default_og_image')) {

    // delete old
    if (!empty($settings->seo_default_og_image) && Storage::disk('public')->exists($settings->seo_default_og_image)) {
        Storage::disk('public')->delete($settings->seo_default_og_image);
    }

    $path = $request->file('seo_default_og_image')->store('site', 'public');
    $settings->seo_default_og_image = $path;
    $settings->save();
}
        return back()->with('success', 'Contact settings updated successfully.');
    }
}
