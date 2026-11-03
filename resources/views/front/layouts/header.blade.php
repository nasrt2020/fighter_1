  <!-- HEADER
        ================================================== -->
      <header class="header-style3">
        <div class="navbar-placeholder"></div>
        <div id="top-bar">
          @php
  $settings = $settings ?? \App\Models\SiteSetting::first();
@endphp

@if(($settings->show_topbar ?? 0) == 1)
<div id="top-bar">
  <div class="container">
    <div class="row">

      <div class="col-md-9 col-xs-12">
        <div class="top-bar-info">
          <ul class="ps-0">
            <li>
              <i class="ti-mobile text-secondary"></i>
              {{ $settings->top_phone ?? '(+93) ...' }}
            </li>

            <li class="d-none d-sm-inline-block">
              <i class="ti-email text-secondary"></i>
              {{ $settings->top_email ?? 'info@ehf.com' }}
            </li>
          </ul>
        </div>
      </div>

      <div class="col-xs-12 col-md-3 d-none d-md-block">
        <ul class="top-social-icon ps-0">

          @if($settings->top_facebook_url)
          <li>
            <a href="{{ $settings->top_facebook_url }}" class="facebook" target="_blank" rel="noopener">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          @endif

          @if($settings->top_youtube_url)
          <li>
            <a href="{{ $settings->top_youtube_url }}" class="youtube" target="_blank" rel="noopener">
              <i class="fab fa-youtube"></i>
            </a>
          </li>
          @endif

          @if($settings->top_instagram_url)
          <li>
            <a href="{{ $settings->top_instagram_url }}" class="instagram" target="_blank" rel="noopener">
              <i class="fab fa-instagram"></i>
            </a>
          </li>
          @endif

        </ul>
      </div>

    </div>
  </div>
</div>
@endif



        <div class="navbar-default ">
        

          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-12">
                <div class="menu_area">
                  <nav class="navbar navbar-expand-lg navbar-light p-0 ">
                    <div class="navbar-header navbar-header-custom">
                      <!-- logo -->
                      <a href="/" class="navbar-brand"
                        ><img
                          id="logo"
                          src="Front/img/logos/logo_3x.png"
                          alt="logo"
                          style="width: 230px"
                      /></a>
                      <!-- end logo -->
                    </div>

                    <div class="navbar-toggler"></div>

                    <!-- menu area -->
                    <ul
                      class="navbar-nav ms-auto mt-lg-2 "
                      id="nav"
                      style="display: none"
                    >
                      <li>
                        <a href="/" data-i18n="nav.home">Home</a>
                      </li>
                    <li>
    <a href="{{ route('about') }}" data-i18n="nav.about">About Us</a>
</li>

                      <li id='changeolor'>
                        <a href="#!" data-i18n="nav.fighter"  class="ropdown-item">Fighters</a>
                        <ul>
                          <li>
                            <a
                              href="{{ route('ehf-fighters') }}"
                              data-i18n="nav.eagle-fighters"
                              >EHF Fighters</a
                            >
                          </li>
                          <li>
                            <a
                              href="{{ route('camp.fighters') }}"
                              data-i18n="nav.traning-fighters"
                              >Camps Fighters</a
                            >
                          </li>
                          <li>
                            <a href="{{ route('coaches') }}" data-i18n="nav.coaches"
                              >Couches Detail</a
                            >
                          </li>
                        </ul>
                      </li>
                   
                      <li>
                        <a href="{{route('contact')}}" data-i18n="nav.contact"
                          >Contact Us</a
                        >
                      </li>
                      <li class="nav-item dropdown language-nav">
                        <a
                          class="nav-link dropdown-toggle d-flex align-items-center justify-content-center"
                          href="#"
                          id="langDropdown"
                          role="button"
                          data-bs-toggle="dropdown"
                          aria-expanded="false"
                          aria-label="Change language"
                        >
                          <!-- Translation / language icon only -->
                          <i class="fas fa-language nav-lang-icon"></i>
                        </a>

                        <ul
                          class="dropdown-menu dropdown-menu-end p-1"
                          aria-labelledby="langDropdown"
                        >
                          <li>
                            <button
                              class="dropdown-item d-flex align-items-center gap-2"
                              data-lang="en"
                              onclick="changeLanguage('en')"
                            >
                              <img
                                src="https://flagcdn.com/w20/us.png"
                                alt="English"
                                width="20"
                                height="15"
                                class="rounded"
                              />
                              English
                            </button>
                          </li>
                          <li>
                            <button
                              class="dropdown-item d-flex align-items-center gap-2"
                              data-lang="prs"
                              onclick="changeLanguage('prs')"
                            >
                              <img
                                src="https://flagcdn.com/w20/af.png"
                                alt="Dari"
                                width="20"
                                height="15"
                                class="rounded"
                              />
                              دری (Dari)
                            </button>
                          </li>
                        </ul>
                      </li>
                    </ul>
                    <!-- end menu area -->

                    <!-- attribute navigation -->
                   
                    <!-- end attribute navigation -->
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>

      