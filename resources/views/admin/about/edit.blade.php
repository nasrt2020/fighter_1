@extends('admin.layouts.app')

@section('title', 'About Content')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">About Content</h4>
                    <p class="card-description">
                        Manage the About section for Home and About page.
                    </p>

                    {{-- Success message --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form class="forms-sample"
                          action="{{ route('admin.about.update') }}"
                          method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Hero Section --}}
                        <h5 class="mt-3 mb-2">Hero / About Section</h5>
                        <div class="form-group">
                            <label>Hero Title</label>
                            <input type="text"
                                   name="hero_title"
                                   class="form-control @error('hero_title') is-invalid @enderror"
                                   value="{{ old('hero_title', $about->hero_title) }}"
                                   placeholder="About Us">
                            @error('hero_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Hero Text</label>
                            <textarea name="hero_text"
                                      class="form-control @error('hero_text') is-invalid @enderror"
                                      rows="4"
                                      placeholder="Welcome to Eagle High Flyer...">{{ old('hero_text', $about->hero_text) }}</textarea>
                            @error('hero_text')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Hero Image Path</label>
                            <input type="text"
                                   name="hero_image"
                                   class="form-control @error('hero_image') is-invalid @enderror"
                                   value="{{ old('hero_image', $about->hero_image) }}"
                                   placeholder="Front/img/about/about2.jpg">
                            @error('hero_image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <small class="form-text text-muted">
                                Relative path from public root, e.g. <code>Front/img/about/about2.jpg</code>
                            </small>
                        </div>

                        <hr>

                        {{-- Stats --}}
                        <h5 class="mt-3 mb-2">Stats</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Fighters Trained</label>
                                    <input type="number"
                                           name="stat_fighters_trained"
                                           class="form-control @error('stat_fighters_trained') is-invalid @enderror"
                                           value="{{ old('stat_fighters_trained', $about->stat_fighters_trained) }}">
                                    @error('stat_fighters_trained')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Pro Fights Won</label>
                                    <input type="number"
                                           name="stat_pro_fights_won"
                                           class="form-control @error('stat_pro_fights_won') is-invalid @enderror"
                                           value="{{ old('stat_pro_fights_won', $about->stat_pro_fights_won) }}">
                                    @error('stat_pro_fights_won')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Years of Camps</label>
                                    <input type="number"
                                           name="stat_years_of_camps"
                                           class="form-control @error('stat_years_of_camps') is-invalid @enderror"
                                           value="{{ old('stat_years_of_camps', $about->stat_years_of_camps) }}">
                                    @error('stat_years_of_camps')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>

                        {{-- Vision Section --}}
                        <h5 class="mt-3 mb-2">Vision Section</h5>

                        <div class="form-group">
                            <label>Vision Title</label>
                            <input type="text"
                                   name="vision_title"
                                   class="form-control @error('vision_title') is-invalid @enderror"
                                   value="{{ old('vision_title', $about->vision_title) }}"
                                   placeholder="Our Vision">
                            @error('vision_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Vision Text</label>
                            <textarea name="vision_text"
                                      class="form-control @error('vision_text') is-invalid @enderror"
                                      rows="4"
                                      placeholder="Our vision is to build one of the most respected MMA organizations...">{{ old('vision_text', $about->vision_text) }}</textarea>
                            @error('vision_text')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Vision Image Path</label>
                            <input type="text"
                                   name="vision_image"
                                   class="form-control @error('vision_image') is-invalid @enderror"
                                   value="{{ old('vision_image', $about->vision_image) }}"
                                   placeholder="Front/img/video/isr.jpg">
                            @error('vision_image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Intro Video URL / Path</label>
                            <input type="text"
                                   name="vision_video_url"
                                   class="form-control @error('vision_video_url') is-invalid @enderror"
                                   value="{{ old('vision_video_url', $about->vision_video_url) }}"
                                   placeholder="Front/img/video/video1.mp4 or full YouTube URL">
                            @error('vision_video_url')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary me-2">
                            Save Changes
                        </button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-light">
                            Cancel
                        </a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
