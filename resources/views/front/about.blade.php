<!DOCTYPE html>
<html lang="en">
 @include('front.layouts.head')
@include('front.layouts.header')


    {{-- ABOUT HERO / WHO WE ARE (from about.html, rewritten for EHF) --}}
    <section class="about-us-section wow fadeInDown" data-wow-delay="200ms">
        <!-- Floating elements -->
        <div class="floating-element float-1"></div>
        <div class="floating-element float-2"></div>
        <div class="floating-element float-3"></div>

        <div class="container about-content">
            <div class="row align-items-center">
                <!-- Text Content -->
                <div class="col-lg-8 position-relative">
                    <h5 class="sub-title">Who We Are</h5>

<p class="description">
    {{ $about->hero_text ?? 'At Eagle High Flyer (EHF), it’s not just about fighting – it’s about mastering discipline, resilience, and mindset.' }}
</p>

<div class="stats-container">
    <div class="stat-item">
        <span class="stat-number">{{ $about->stat_fighters_trained ?? 0 }}+</span>
        <div class="stat-text">Fighters Trained</div>
    </div>
    <div class="stat-item">
        <span class="stat-number">{{ $about->stat_pro_fights_won ?? 0 }}+</span>
        <div class="stat-text">Pro Fights Won</div>
    </div>
    <div class="stat-item">
        <span class="stat-number">{{ $about->stat_years_of_camps ?? 0 }}</span>
        <div class="stat-text">Years of Camps</div>
    </div>
</div>

                    <a href="{{ route('home') }}#joinTeamForm" class="btn btn-gradient">
                        <i class="fas fa-fist-raised me-2"></i>Start Your Journey
                    </a>
                </div>

                <!-- Image Content (desktop only) -->
                <div class="col-lg-4 text-center position-relative d-none d-lg-block">
                    <div class="about-img-wrapper">
                        <img
                            src="{{ asset('Front/img/video/image.png') }}"
                            alt="MMA Training at EHF"
                            class="img-fluid about-img"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- VISION SECTION --}}
    <section class="pt-0 mt-3">
        <div class="container">
            <div class="row align-items-center">
                <!-- Video / Image -->
                <div class="col-lg-6 order-2 order-lg-1 wow fadeIn" data-wow-delay="200ms">
                    <div class="position-relative">
                       <img src="{{ asset($about->vision_image ?? 'Front/img/video/isr.jpg') }}"
     class="tilt rounded" alt="EHF Vision" />
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <div class="d-inline-block align-middle">
                               <a class="video_btn-style1 popup-social-video video_btn small"
   href="{{ asset($about->vision_video_url ?? 'Front/img/video/video1.mp4') }}">
   <i class="fas fa-play"></i>
</a>
                            </div>
                            <div class="d-none d-sm-inline-block align-middle font-weight-700 ms-4 text-white text-start">
                                Watch
                                <span class="text-uppercase d-block">Intro Video</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Vision Text -->
                <div class="col-lg-5 offset-xl-1 order-1 order-lg-2 mb-1-9 mb-md-2-5 mb-lg-0 wow fadeIn"
                     data-wow-delay="400ms">
                    <div>
                        <div class="section-heading mb-3 mb-lg-4 text-start">
                            <span
  class="d-block text-primary display-22 display-md-21 display-lg-20 alt-font wow text-animation"
  data-in-effect="fadeInRight"
>
  {{ $about->vision_title ?? 'Our Vision' }}
</span>

<h2>{{ $about->vision_title ?? 'Our Vision' }}</h2>

<p class="display-29 display-lg-28 mb-1-6 mb-lg-2-3">
  {{ $about->vision_text ?? 'Our vision is to build one of the most respected MMA organizations in the region...' }}
</p>

                    </div>
                </div>
            </div>
        </div>
        <img
            src="{{ asset('Front/img/icons/icon2.png') }}"
            alt=""
            class="w-10 h-10 position-absolute right-5 top-75 ani-top-bottom opacity7 d-none d-lg-block"
        />
    </section>

    {{-- HISTORY / TIMELINE --}}
    <section class="pt-5 pb-5 text-white">
        <div class="container">
            <!-- Heading -->
            <div class="section-heading text-center mb-5">
                <span class="d-block text-dangerr text-uppercase small">History</span>
                <h2 class="fw-bold display-4">Our Journey</h2>
            </div>

            <div class="timeline">
    @foreach($timelineEvents as $event)
        <div class="timeline-item {{ $event->side }} wow fadeIn{{ $event->side === 'left' ? 'Right' : 'Left' }}" data-wow-delay="200ms">
            <div class="timeline-content">
                <div class="timeline-icon">
                    @if($event->image_path)
                        <img src="{{ asset($event->image_path) }}" alt="{{ $event->year_label ?? $event->title }}" />
                    @endif
                </div>
                @if($event->year_label)
                    <h4 class="h5 mb-2 text-dangerr">{{ $event->year_label }}</h4>
                @else
                    <h4 class="h5 mb-2 text-dangerr">{{ $event->title }}</h4>
                @endif
                <p>{{ $event->description }}</p>
            </div>
        </div>
    @endforeach
</div>


    </section>

    {{-- EHF LEADERSHIP CHART --}}
   <section id="ehfTeamChart" class="ehf-org-section text-white">
    <div class="container">
        <p class="ehf-org-title display-22">EHF Leadership & Team</p>

        <div class="ehf-org-chart">
            @if($teamOwner)
                <div class="ehf-org-level ehf-org-owner wow fadeInRight" data-wow-delay="200ms">
                    <div class="ehf-org-card">
                        <div class="ehf-org-photo">
                            @if($teamOwner->photo_path)
                                <img src="{{ asset($teamOwner->photo_path) }}" alt="{{ $teamOwner->name }}" />
                            @endif
                        </div>

                        <div class="ehf-org-role">{{ $teamOwner->role }}</div>
                        <div class="ehf-org-name">{{ $teamOwner->name }}</div>
                        <p class="ehf-org-note">{{ $teamOwner->note }}</p>
                    </div>
                </div>

                <div class="ehf-org-connector"></div>
            @endif

            <div class="ehf-org-level ehf-org-members">
                @foreach($teamMembers as $member)
                    <div class="ehf-org-card wow fadeInLeft" data-wow-delay="200ms">
                        <div class="ehf-org-photo">
                            @if($member->photo_path)
                                <img src="{{ asset($member->photo_path) }}" alt="{{ $member->name }}" />
                            @endif
                        </div>

                        <div class="ehf-org-role">{{ $member->role }}</div>
                        <div class="ehf-org-name">{{ $member->name }}</div>
                        <p class="ehf-org-note">{{ $member->note }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


@include('front.layouts.footer-js')