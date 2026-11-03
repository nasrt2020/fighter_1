<!-- BANNER
        ================================================== -->

      <section class="p-0 main-banner">
    <div class="slider-fade owl-carousel owl-theme w-100 alt-font">
        @forelse($heroSlides as $slide)
            <div
              class="text-start item bg-img cover-background pt-6 pb-14 py-md-16 py-lg-20 py-xxl-24 rounded-lg main-font"
              data-overlay-dark="{{ $slide->overlay ?? 6 }}"
              data-background="{{ $slide->image_path ? asset('storage/'.$slide->image_path) : asset('Front/img/video/image1.jpg') }}"
            >
                <div class="container">
                    <div class="row ">
                        <div class="col-md-10 col-lg-8 col-xl-7 col-xxl-6 mb-1-9 mb-lg-0 py-5">
                             <h1>{{ $slide->title }}</h1>
                            @if($slide->subtitle)
    <span class="d-block display-22 display-md-21 display-lg-20 alt-font mb-3 ehf-sub-owl">
  {{ $slide->subtitle }}
</span>
                            @endif

                         

                            @if($slide->button_text && $slide->button_link)
                                <a href="{{ $slide->button_link }}" class="butn medium">
                                    {{ $slide->button_text }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            
        @endforelse
    </div>
</section>

     


<!-- ABOUT EHF SECTION -->
<section class="ehf-about-section">
  <div class="container">
    <div class="row align-items-center">

      <!-- LEFT SIDE: DYNAMIC IMAGE -->
      <div
        class="col-lg-7 mb-4 mb-lg-0 wow fadeIn"
        data-wow-delay="200ms"
      >
        <div class="ehf-about-image-wrapper">

          <img
            src="{{ asset($about->hero_image ?? 'Front/img/about/about2.jpg') }}"
            class="ehf-about-image"
            alt="About Eagle High Flyer"
          />

          <!-- EHF BRANDING LABEL -->
          <div class="ehf-about-image-brand">
            <strong>EHF</strong>
            <span>EAGLE HIGH FLYER</span>
          </div>

        </div>
      </div>

      <!-- RIGHT SIDE: ORIGINAL TEXT - UNCHANGED -->
      <div class="col-lg-5 wow fadeIn" data-wow-delay="400ms">
        <div class="ps-xl-8">
          <div class="section-heading mb-4 text-start">
            <span
              class="d-block display-22 display-md-21 display-lg-20 alt-font wow text-animation text-uppercase"
              data-in-effect="fadeInRight"
            >
              {{ $about->hero_title ?? 'About Us' }}
            </span>

            <p>
              {{ $about->hero_text ?? 'Welcome to Eagle High Flyer, a premier platform dedicated to promoting mixed martial arts (MMA) and combat sports across the region.' }}
            </p>

            <a href="{{ route('about') }}" class="butn-read">
              <span data-i18n="about.readMore">Read More</span>
            </a>

          </div>
        </div>
      </div>

    </div>
  </div>
</section>
