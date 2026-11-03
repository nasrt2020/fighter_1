<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo "  href="#"><img src="{{asset('assets/admin/assets/images/logo@3xx.png') }}" style="height: 40px;  width: 170px;"  alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="#"><img src="{{asset('assets/admin/assets/images/logo-w.png') }}" style="height: 40px;  width: 50px;" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('admin.dashboard')}}">
              <span class="menu-icon">
                <i class="mdi mdi-view-dashboard-outline"></i>
              </span>
         <span class="menu-title">{{ __('admin.dashboard') }}</span>

            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-account-group-outline"></i>
              </span>
              <span class="menu-title">{{ __('admin.EHF&Camps_Fighters') }} </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item menu-items">
  <a class="nav-link" href="{{ route('admin.fighters.index') }}">
    <span class="menu-icon">
      <i class="mdi mdi-star-circle-outline"></i>
    </span>
    <span class="menu-title">{{ __('admin.key_fighters') }}</span> 
  </a>
</li>
               <li class="nav-item menu-items">
  <a class="nav-link" href="{{ route('admin.ehf-fighters.index') }}">
    <span class="menu-icon">
      <i class="mdi mdi-boxing-glove"></i>
    </span>
    <span class="menu-title">{{ __('admin.ehf_fighters') }}</span>
  </a>
</li>

              </ul>
            </div>
       
   
     <li class="nav-item menu-items">
  <a class="nav-link" href="{{ route('admin.camps.index') }}">
    <span class="menu-icon">
      <i class="mdi mdi-calendar-clock"></i>
    </span>
    <span class="menu-title">{{ __('admin.camps_schedule') }}</span>
  </a>
</li>
          <li class="nav-item menu-items">
    <a class="nav-link" href="{{ route('admin.applications.index') }}">
        <span class="menu-icon">
            <i class="mdi mdi-file-document-edit-outline"></i>
        </span>
        <span class="menu-title">{{ __('admin.EHF_application') }}</span>
    </a>
</li>
<li class="nav-item menu-items">
    <a class="nav-link" href="{{ route('admin.about.edit') }}">
      <span class="menu-icon">
        <i class="mdi mdi-information-outline"></i>
      </span>
      <span class="menu-title">{{ __('admin.about_content') }}</span>
    </a>
</li>
<li class="nav-item menu-items">
    <a class="nav-link" href="{{ route('admin.timeline-events.index') }}">
        <span class="menu-icon">
            <i class="mdi mdi-timeline-text-outline"></i>
        </span>
        <span class="menu-title">{{ __('admin.timeline_events') }}</span>
    </a>
</li>
<li class="nav-item menu-items">
    <a class="nav-link" href="{{ route('admin.team-members.index') }}">
        <span class="menu-icon">
            <i class="mdi mdi-account-group-outline"></i>
        </span>
        <span class="menu-title">{{ __('admin.team_members') }}</span>
    </a>
</li>
<li class="nav-item menu-items">
    <a class="nav-link" href="{{ route('admin.hero-slides.index') }}">
        <span class="menu-icon">
            <i class="mdi mdi-image-multiple"></i>
        </span>
        <span class="menu-title">{{ __('admin.hero_slides') }}</span>
    </a>
</li>
<li class="nav-item menu-items">
    <a class="nav-link" href="{{ route('admin.challenge-requests.index') }}">
        <span class="menu-icon">
            <i class="mdi mdi-sword-cross"></i>
        </span>
        <span class="menu-title">{{ __('admin.challenges') }}</span>
    </a>
</li>
<li class="nav-item menu-items">
    <a class="nav-link" href="{{ route('admin.camp-applications.index') }}">
        <span class="menu-icon">
            <i class="mdi mdi-clipboard-check-outline"></i>
        </span>
        <span class="menu-title">{{ __('admin.camp_applications') }} </span>
    </a>
</li>

<li class="nav-item menu-items {{ request()->routeIs('admin.camp-stats.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.camp-stats.edit') }}">
        <span class="menu-icon">
            <i class="mdi mdi-chart-bar"></i>
        </span>
        <span class="menu-title"> {{ __('admin.camp_stats') }}</span>
    </a>
</li>

<li class="nav-item menu-items {{ request()->routeIs('admin.camp-stats.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.coaches.index') }}">
        <span class="menu-icon">
            <i class="mdi mdi-tune"></i>
        </span>
        <span class="menu-title"> {{ __('admin.coaches') }} </span>
    </a>
</li>

<li class="nav-item menu-items {{ request()->routeIs('admin.camp-stats.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{  route('admin.contact-messages.index')  }}">
        <span class="menu-icon">
            <i class="mdi mdi-email-outline"></i>
        </span>
       <span>{{ __('admin.contact_messages') }}</span>
    </a>
</li>
<li class="nav-item menu-items {{ request()->routeIs('admin.camp-stats.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.settings.contact') }}">
        <span class="menu-icon">
            <i class="mdi mdi-tune"></i>
        </span>
       <span>{{ __('admin.contact_settings') }}</span>
    </a>
</li>


<li class="nav-item menu-items {{ request()->routeIs('admin.camp-stats.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.upcomingFight.edit') }}">
        <span class="menu-icon">
            <i class="mdi mdi-calendar-star"></i>
        </span>
       <span>{{ __('admin.upcoming_fight') }}</span>
    </a>
</li>
          <!-- <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
              </ul>
            </div>
          </li> -->
          <!-- <li class="nav-item menu-items">
            <a class="nav-link" href="http://www.bootstrapdash.com/demo/corona-free/jquery/documentation/documentation.html">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Documentation</span>
            </a>
          </li> -->
        </ul>
      </nav>