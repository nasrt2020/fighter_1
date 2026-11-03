  @php
  $settings = \App\Models\SiteSetting::first();
@endphp

  <footer
        class="ehf-footer bg-img cover-background mt-3"
        data-overlay-dark="85"
        data-background=""
      >
        <div class="container">
          <div class="row mt-n2-9">
            <!-- Brand / About / Social -->
            <div
              class="col-lg-4 col-md-6 mt-2-9 wow fadeIn"
              data-wow-delay="200ms"
            >
              <div class="mb-1-6 footer-logo-wrap">
 <img
  src="{{ !empty($settings?->footer_logo) ? asset('storage/'.$settings->footer_logo) : asset('Front/img/logos/logo@3xx.png') }}"
  alt="EHF Logo"
  class="footer-logo"
/>

              </div>
              <p class="text-white opacity9 font-weight-300 mb-1-9">
  {{ $settings->footer_about_text ?? 'Eagle High Flyer develops, supports and showcases elite MMA fighters with discipline, faith and professionalism.' }}
</p>
           <ul class="social-icon-style2">
  @if(!empty($settings?->facebook_url))
    <li><a href="{{ $settings->facebook_url }}" target="_blank" rel="noopener"><i class="fab fa-facebook-f"></i></a></li>
  @endif
  @if(!empty($settings?->instagram_url))
    <li><a href="{{ $settings->instagram_url }}" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a></li>
  @endif
  @if(!empty($settings?->youtube_url))
    <li><a href="{{ $settings->youtube_url }}" target="_blank" rel="noopener"><i class="fab fa-youtube"></i></a></li>
  @endif
  @if(!empty($settings?->linkedin_url))
    <li><a href="{{ $settings->linkedin_url }}" target="_blank" rel="noopener"><i class="fab fa-linkedin-in"></i></a></li>
  @endif
</ul>

            </div>

            <!-- Quick Links -->
            <div
              class="col-lg-4 col-md-6 mt-2-9 wow fadeIn"
              data-wow-delay="400ms"
            >
              <div class="ps-lg-1-9 ps-xl-8">
                <h3 class="footer-title" data-i18n="footer.quickLinks">
                  Quick Links
                </h3>
                <ul class="footer-list ps-0">
                  <li class="pt-0">
                    <a href="{{ route('about') }}" data-i18n="footer.about">About Us</a>
                  </li>
                  <li>
                    <a
                      href="{{ route('ehf-fighters') }}"
                      data-i18n="footer.ehfFighters"
                    >
                      EHF Fighters
                    </a>
                  </li>
                  <li>
                    <a
                      href="{{ route('camp.fighters') }}"
                      data-i18n="footer.campFighters"
                    >
                      Camps Fighters
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('coaches') }}" data-i18n="footer.coaches">
                      Coaches Detail
                    </a>
                  </li>
               
                  <li>
                    <a href="{{route('contact')}}" data-i18n="footer.contact">
                      Contact Us
                    </a>
                  </li>
                </ul>
              </div>
            </div>

            <!-- Contact -->
            <div
              class="col-lg-4 col-md-6 mt-2-9 wow fadeIn"
              data-wow-delay="600ms"
            >
              <div>
                <h3 class="footer-title" data-i18n="footer.contactTitle">
                  Contact Us
                </h3>
                <ul class="footer-list ps-0">
                  <li class="pt-0">
                    <span class="d-inline-block align-middle">
                      <i class="fas fa-map-marker-alt display-29"></i>
                    </span>
                <span class="d-inline-block w-85 align-top ps-2">
  {{ $settings->footer_address ?? '500 Family, behind Sultan Hall, Kabul, Afghanistan' }}
</span>
                  </li>
                  <li>
                    <span class="d-inline-block align-middle">
                      <i class="far fa-envelope display-29"></i>
                    </span>
                 <span class="d-inline-block w-85 align-top ps-2">
  {{ $settings->footer_email ?? 'info@ehf.com' }}
</span>
                  </li>
                  <li>
                    <span class="d-inline-block align-middle">
                      <i class="fas fa-globe display-29"></i>
                    </span>
                  <span class="d-inline-block w-85 align-top ps-2">
  {{ $settings->footer_website ?? 'www.ehf.com' }}
</span>
                  </li>
                  <li class="pb-0">
                    <span class="d-inline-block align-middle">
                      <i class="fas fa-phone display-29"></i>
                    </span>
                 <span class="d-inline-block w-85 align-top ps-2">
  {{ $settings->footer_phone ?? '+93 79 175 3511' }}
</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Bottom Bar -->
          <div
            class="footer-bar borders-top border-color-light-white wow fadeIn"
            data-wow-delay="400ms"
          >
            <div class="row">
              <div class="col-md-12 text-center">
              <p class="mb-0">
  {{ $settings->footer_copy ?? '© '.date('Y').' Eagle High Flyer. All rights reserved.' }}
</p>

              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- start scroll to top -->
    <a href="#!" class="scroll-to-top"
      ><i class="fas fa-angle-up" aria-hidden="true"></i
    ></a>
    <!-- end scroll to top -->

    <!-- all js include start -->

    <!-- jQuery -->
    <script src="Front/js/jquery.min.js"></script>

    <!-- popper js -->
    <script src="Front/js/popper.min.js"></script>

    <!-- bootstrap -->
    <script src="Front/js/bootstrap.min.js"></script>

    <!-- search -->
    <script src="Front/search/search.js"></script>

    <!-- navigation -->
    <script src="Front/js/nav-menu.js"></script>

    <!-- tab -->
    <script src="Front/js/easy.responsive.tabs.js"></script>

    <!-- owl carousel -->
    <script src="Front/js/owl.carousel.js"></script>

    <!-- jquery.counterup.min -->
    <script src="Front/js/jquery.counterup.min.js"></script>

    <!-- stellar js -->
    <script src="Front/js/jquery.stellar.min.js"></script>

    <!-- waypoints js -->
    <script src="Front/js/waypoints.min.js"></script>

    <!-- countdown js -->
    <script src="Front/js/countdown.js"></script>

    <!-- jquery.magnific-popup js -->
    <script src="Front/js/jquery.magnific-popup.min.js"></script>

    <!-- isotope.pkgd.min js -->
    <script src="Front/js/isotope.pkgd.min.js"></script>

    <!-- lightgallery js -->
    <script src="Front/js/lightgallery-all.js"></script>

    <!-- mousewheel js -->
    <script src="Front/js/jquery.mousewheel.min.js"></script>

    <!-- wow js -->
    <script src="Front/js/wow.js"></script>

    <!-- lettering js -->
    <script src="Front/js/jquery.lettering.js"></script>

    <!-- textillate js -->
    <script src="Front/js/jquery.textillate.js"></script>

    <!-- tilt js -->
    <script src="Front/js/tilt.js"></script>

    <!-- custom scripts -->
    <script src="Front/js/main.js"></script>

    <!-- form plugins js -->
     
    <script src="Front/quform/js/plugins.js"></script>

    <!-- form scripts js -->
    <script src="Front/quform/js/scripts.js"></script>

    <!-- all js include end -->
    
