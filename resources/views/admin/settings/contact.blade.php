@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h4 class="mb-3">Contact Settings</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.settings.contact.update') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Phone 1</label>
                        <input class="form-control" name="phone_1" value="{{ old('phone_1', $settings->phone_1) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Phone 2</label>
                        <input class="form-control" name="phone_2" value="{{ old('phone_2', $settings->phone_2) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email 1</label>
                        <input class="form-control" name="email_1" value="{{ old('email_1', $settings->email_1) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email 2</label>
                        <input class="form-control" name="email_2" value="{{ old('email_2', $settings->email_2) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Address line 1</label>
                        <input class="form-control" name="address_line_1" value="{{ old('address_line_1', $settings->address_line_1) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Address line 2</label>
                        <input class="form-control" name="address_line_2" value="{{ old('address_line_2', $settings->address_line_2) }}">
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label">Google Map iframe src</label>
                        <textarea class="form-control" name="map_iframe_src" rows="3">{{ old('map_iframe_src', $settings->map_iframe_src) }}</textarea>
                        <small class="text-muted">
                            Put only the URL (the iframe src). Example: https://maps.google.com/maps?q=kabul&t=&z=13&ie=UTF8&iwloc=&output=embed
                        </small>
                    </div>
                </div>
<h4 class="mt-5  d-flex justify-content-center">Footer Settings</h4>
<div class="mb-3">
  <label class="form-label">Footer Logo</label>

  @if(!empty($settings->footer_logo))
    <div class="mb-2">
      <img src="{{ asset('storage/'.$settings->footer_logo) }}" alt="Footer Logo" style="max-height:70px;">
    </div>
  @endif

  <input type="file" name="footer_logo" class="form-control" accept="image/*">
  <small class="text-muted">PNG/JPG/WebP, recommended 400x150</small>
</div>

<div class="mb-3">
  <label class="form-label">Footer About Text</label>
  <textarea class="form-control" name="footer_about_text" rows="3">{{ old('footer_about_text', $settings->footer_about_text) }}</textarea>
</div>

<div class="row">
  <div class="col-md-6 mb-3">
    <label class="form-label">Footer Address</label>
    <input class="form-control" name="footer_address" value="{{ old('footer_address', $settings->footer_address) }}">
  </div>
  <div class="col-md-6 mb-3">
    <label class="form-label">Footer Email</label>
    <input class="form-control" name="footer_email" value="{{ old('footer_email', $settings->footer_email) }}">
  </div>
</div>

<div class="row">
  <div class="col-md-6 mb-3">
    <label class="form-label">Website</label>
    <input class="form-control" name="footer_website" value="{{ old('footer_website', $settings->footer_website) }}">
  </div>
  <div class="col-md-6 mb-3">
    <label class="form-label">Footer Phone</label>
    <input class="form-control" name="footer_phone" value="{{ old('footer_phone', $settings->footer_phone) }}">
  </div>
</div>

<div class="row">
  <div class="col-md-6 mb-3">
    <label class="form-label">Facebook URL</label>
    <input class="form-control" name="facebook_url" value="{{ old('facebook_url', $settings->facebook_url) }}">
  </div>
  <div class="col-md-6 mb-3">
    <label class="form-label">Instagram URL</label>
    <input class="form-control" name="instagram_url" value="{{ old('instagram_url', $settings->instagram_url) }}">
  </div>
</div>

<div class="row">
  <div class="col-md-6 mb-3">
    <label class="form-label">YouTube URL</label>
    <input class="form-control" name="youtube_url" value="{{ old('youtube_url', $settings->youtube_url) }}">
  </div>
  <div class="col-md-6 mb-3">
    <label class="form-label">LinkedIn URL</label>
    <input class="form-control" name="linkedin_url" value="{{ old('linkedin_url', $settings->linkedin_url) }}">
  </div>
</div>

<div class="mb-3">
  <label class="form-label">Footer Copyright Text</label>
  <input class="form-control" name="footer_copy" value="{{ old('footer_copy', $settings->footer_copy) }}">
</div>
<h4 class="mt-4 d-flex justify-content-center">Top Bar Settings</h4>

<div class="form-group">
  <label>Top Phone</label>
  <input type="text" name="top_phone" class="form-control"
         value="{{ old('top_phone', $settings->top_phone) }}">
</div>

<div class="form-group">
  <label>Top Email</label>
  <input type="email" name="top_email" class="form-control"
         value="{{ old('top_email', $settings->top_email) }}">
</div>

<div class="form-check mb-3">
  <input class="form-check-input" type="checkbox" name="show_topbar" value="1"
         {{ old('show_topbar', $settings->show_topbar) ? 'checked' : '' }}>
  <label class="form-check-label">Show Top Bar</label>
</div>

<div class="form-group">
  <label>Facebook URL</label>
  <input type="url" name="top_facebook_url" class="form-control"
         value="{{ old('top_facebook_url', $settings->top_facebook_url) }}">
</div>

<div class="form-group">
  <label>YouTube URL</label>
  <input type="url" name="top_youtube_url" class="form-control"
         value="{{ old('top_youtube_url', $settings->top_youtube_url) }}">
</div>

<div class="form-group">
  <label>Instagram URL</label>
  <input type="url" name="top_instagram_url" class="form-control"
         value="{{ old('top_instagram_url', $settings->top_instagram_url) }}">
</div>

<hr>
<h4>SEO Settings</h4>

<div class="mb-3">
  <label class="form-label">Site SEO Title</label>
  <input type="text" name="seo_site_title" class="form-control"
         value="{{ old('seo_site_title', $settings->seo_site_title) }}"
         placeholder="Eagle High Flyer - MMA Academy">
</div>

<div class="mb-3">
  <label class="form-label">Site SEO Description</label>
  <textarea name="seo_site_description" class="form-control" rows="3"
            placeholder="Short description for Google...">{{ old('seo_site_description', $settings->seo_site_description) }}</textarea>
</div>

<div class="mb-3">
  <label class="form-label">Default OG Image (social preview)</label>
  <input type="file" name="seo_default_og_image" class="form-control">

  @if($settings->seo_default_og_image)
    <div class="mt-2">
      <img src="{{ asset('storage/'.$settings->seo_default_og_image) }}" style="max-height:80px;">
    </div>
  @endif
</div>
<div class="mb-3">
  <label class="form-label">SEO Keywords</label>
  <textarea name="seo_keywords" class="form-control" rows="3"
    placeholder="Example: MMA, Eagle High Flyer, Kabul gym, fighters, training">{{ old('seo_keywords', $settings->seo_keywords) }}</textarea>
  <small class="text-muted">
    Separate keywords with commas.
  </small>
</div>


                <button class="btn btn-primary">Save Settings</button>
            </form>
        </div>
    </div>
</div>
@endsection
