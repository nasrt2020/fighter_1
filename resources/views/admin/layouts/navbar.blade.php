 <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="#"><img src="{{asset('assets/admin/assets/images/logo-w.png') }}" style="height: 40px;  width: 50px;" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
           
            <ul class="navbar-nav navbar-nav-right">
   <!-- here is the code    quick actions  -->
           <li class="nav-item dropdown d-none d-lg-block">
  <a class="nav-link btn btn-success create-new-button" data-bs-toggle="dropdown" href="#">
  + {{ __('admin.quick_actions') }} 
  </a>

  <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list">
    <h6 class="p-3 mb-0">Quick Actions</h6>
    <div class="dropdown-divider"></div>

    <a class="dropdown-item preview-item" href="{{ route('admin.fighters.create') }}">
      <div class="preview-thumbnail">
        <div class="preview-icon bg-dark rounded-circle">
          <i class="mdi mdi-account-plus text-primary"></i>
        </div>
      </div>
      <div class="preview-item-content">
        <p class="preview-subject ellipsis mb-1">{{ __('admin.add_key_fighter') }}</p>
      </div>
    </a>
    <a class="dropdown-item preview-item" href="{{ route('admin.camp-applications.index') }}">
      <div class="preview-thumbnail">
        <div class="preview-icon bg-dark rounded-circle">
          <i class="mdi mdi-account-plus text-primary"></i>
        </div>
      </div>
      <div class="preview-item-content">
        <p class="preview-subject ellipsis mb-1">{{ __('admin.add_camp_fighter') }}</p>
      </div>
    </a>
 <a class="dropdown-item preview-item" href="{{ route('admin.ehf-fighters.create') }}">
      <div class="preview-thumbnail">
        <div class="preview-icon bg-dark rounded-circle">
          <i class="mdi mdi-account-plus text-primary"></i>
        </div>
      </div>
      <div class="preview-item-content">
        <p class="preview-subject ellipsis mb-1">{{ __('admin.add_ehf_fighter') }}</p>
      </div>
    </a>
    <div class="dropdown-divider"></div>

    <a class="dropdown-item preview-item" href="{{ route('admin.coaches.create') }}">
      <div class="preview-thumbnail">
        <div class="preview-icon bg-dark rounded-circle">
          <i class="mdi mdi-account-tie text-info"></i>
        </div>
      </div>
      <div class="preview-item-content">
        <p class="preview-subject ellipsis mb-1">{{ __('admin.add_coach') }}</p>
      </div>
    </a>

    <div class="dropdown-divider"></div>

    <a class="dropdown-item preview-item" href="{{ route('admin.timeline-events.create') }}">
      <div class="preview-thumbnail">
        <div class="preview-icon bg-dark rounded-circle">
          <i class="mdi mdi-calendar-plus text-warning"></i>
        </div>
      </div>
      <div class="preview-item-content">
        <p class="preview-subject ellipsis mb-1">{{ __('admin.add_timeline_event') }}</p>
      </div>
    </a>

    <div class="dropdown-divider"></div>

    <a class="dropdown-item preview-item" href="{{ route('home') }}" target="_blank">
      <div class="preview-thumbnail">
        <div class="preview-icon bg-dark rounded-circle">
          <i class="mdi mdi-web text-success"></i>
        </div>
      </div>
      <div class="preview-item-content">
        <p class="preview-subject ellipsis mb-1">{{ __('admin.view_website') }}</p>
      </div>
    </a>
  </div>
</li>
<!-- here is the code end  of quick actions  -->

<li class="nav-item dropdown ">
  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
    🌐 {{ app()->getLocale() === 'fa' ? 'دری' : 'English' }}
  </a>

  <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list">
    <a class="dropdown-item" href="{{ route('language.switch', 'en') }}">
      <img
       src="https://flagcdn.com/w20/us.png"
       alt="English"
       width="20"
      height="14"
      class="rounded m-2"
       /> English</a>
    <a class="dropdown-item" href="{{ route('language.switch', 'fa') }}">
     <img
       src="https://flagcdn.com/w20/af.png"
               alt="Dari"
               width="20"
             height="14"
          class="rounded m-2"
      /> 
  (Dari)  دری</a>
  </div>
</li>

              <li class="nav-item nav-settings d-none d-lg-block">
                
              </li>
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="mdi mdi-email"></i>
  
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0">Messages</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="{{asset('assets/admin/assets/images/faces/face4.jpg') }}" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                      <p class="text-muted mb-0"> 1 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="{{asset('Front/img/logos/we kan@3x1.png') }}" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
                      <p class="text-muted mb-0"> 15 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="{{asset('assets/admin/assets/images/faces/face3.jpg') }}" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
                      <p class="text-muted mb-0"> 18 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">4 new messages</p>
                </div>
              </li>
              <li class="nav-item dropdown border-left">



<!-- here is the code ofnotifications  -->
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
  <i class=" mdi mdi-bell" ></i>
  <span class="count font-weight-bold" id="navNotifBadge" style="display:none;color:red;font: bold;    font-size: small;"></span>
</a>

    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
  <h6 class="p-3 mb-0">{{ __('admin.notifications') }}</h6>
  <div class="dropdown-divider"></div>

  {{-- Unread Messages --}}
  <a class="dropdown-item preview-item" href="{{ route('admin.contact-messages.index') }}">
    <div class="preview-thumbnail">
      <div class="preview-icon bg-success rounded-circle">
        <i class="mdi mdi-email"></i>
      </div>
    </div>
    <div class="preview-item-content">
      <p class="preview-subject mb-1">{{ __('admin.unread_messages') }}</p>
      <p class="text-muted mb-0">
        <span id="navUnreadMessages" class="badge badge-success">0</span>
      </p>
    </div>
  </a>

  <div class="dropdown-divider"></div>

  {{-- Pending Challenges --}}
  <a class="dropdown-item preview-item" href="{{ route('admin.challenge-requests.index') }}">
    <div class="preview-thumbnail">
      <div class="preview-icon bg-danger rounded-circle">
        <i class="mdi mdi-sword-cross"></i>
      </div>
    </div>
    <div class="preview-item-content">
      <p class="preview-subject mb-1">{{ __('admin.pending_challenges') }}</p>
      <p class="text-muted mb-0">
        <span id="navPendingChallenges" class="badge badge-danger">0</span>
      </p>
    </div>
  </a>

  <div class="dropdown-divider"></div>

  {{-- Pending Camp Applications --}}
  <a class="dropdown-item preview-item" href="{{ route('admin.camp-applications.index') }}">
    <div class="preview-thumbnail">
      <div class="preview-icon bg-warning rounded-circle">
        <i class="mdi mdi-clipboard-check-outline"></i>
      </div>
    </div>
    <div class="preview-item-content">
      <p class="preview-subject mb-1">{{ __('admin.pending_camp_applications') }}</p>
      <p class="text-muted mb-0">
        <span id="navPendingCampApps" class="badge badge-warning">0</span>
      </p>
    </div>
  </a>

  <div class="dropdown-divider"></div>

  {{-- Pending EHF Applications --}}
  <a class="dropdown-item preview-item" href="{{ route('admin.applications.index') }}">
    <div class="preview-thumbnail">
      <div class="preview-icon bg-info rounded-circle">
        <i class="mdi mdi-account-check"></i>
      </div>
    </div>
    <div class="preview-item-content">
      <p class="preview-subject mb-1">{{ __('admin.pending_ehf_applications') }}</p>
      <p class="text-muted mb-0">
        <span id="navPendingEhfApps" class="badge badge-info">0</span>
      </p>
    </div>
  </a>
</div>

<!-- here is the  end  code ofnotifications   -->
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                  <div class="navbar-profile">
                   
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><span class="ms-2">{{ auth()->user()->name }}</span>
</p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">{{ __('admin.profile') }}</h6>
                  <div class="dropdown-divider"></div>
             
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                   
                      <form method="POST" action="{{ route('logout') }}">
  @csrf
  <button type="submit" class="dropdown-item">  {{ __('admin.logout') }}</button>
</form>

                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>