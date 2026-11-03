@extends('admin.layouts.app')

@section('content')


    <div class="row">
        <div class="col-12 mb-4 text-center">
            <h3 class="text-white">{{ __('admin.welcome') }}</h3>
            <p class="text-muted">{{ __('admin.manage_text') }}</p>
        </div>
      <div class="row g-3">

 <div class="row">

  <div class="col-md-3 mb-3">
    <div class="card shadow-sm position-relative">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <small class="text-muted">{{ __('admin.total_fighters') }}</small>
          <h2 class="mb-0">{{ $totalFighters }}</h2>
          <a href="{{ route('admin.fighters.index') }}" class="stretched-link"></a>
        </div>
        <div class="icon-circle bg-primary">
          <i class="mdi mdi-account-group"></i>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3 mb-3">
    <div class="card shadow-sm position-relative">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <small class="text-muted">{{ __('admin.key_fighters') }}</small>
          <h2 class="mb-0">{{ $keyFighters }}</h2>
          <a href="{{ route('admin.fighters.index') }}" class="stretched-link"></a>
        </div>
        <div class="icon-circle bg-warning">
          <i class="mdi mdi-star-circle"></i>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3 mb-3">
    <div class="card shadow-sm position-relative">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <small class="text-muted">{{ __('admin.camp_fighters') }}</small>
          <h2 class="mb-0">{{ $totalKeyCampFighters }}</h2>
          <a href="{{ route('admin.camp-applications.index') }}" class="stretched-link"></a>
        </div>
        <div class="icon-circle bg-success">
          <i class="mdi mdi-dumbbell"></i>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3 mb-3">
    <div class="card shadow-sm position-relative">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <small class="text-muted">{{ __('admin.ehf_fighters') }}</small>
          <h2 class="mb-0">{{ $ehfFighters }}</h2>
          <a href="{{ route('admin.ehf-fighters.index') }}" class="stretched-link"></a>
        </div>
        <div class="icon-circle bg-danger">
          <i class="mdi mdi-boxing-glove"></i>
        </div>
      </div>
    </div>
  </div>

 

  <div class="col-md-3 mb-3">
    <div class="card shadow-sm position-relative">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <small class="text-muted">{{ __('admin.challenges') }}</small>
          <h2 class="mb-0">{{ $challenges }}</h2>
          <small class="text-warning">Pending: {{ $pendingChallenges }}</small>
          <a href="{{ route('admin.challenge-requests.index') }}" class="stretched-link"></a>
        </div>
        <div class="icon-circle bg-danger">
          <i class="mdi mdi-sword-cross"></i>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3 mb-3">
    <div class="card shadow-sm position-relative">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <small class="text-muted"> {{ __('admin.applications') }}</small>
          <h2 class="mb-0">{{ $campapplication }}</h2>
          
               <small class="text-warning">Pending: {{ $pendingCampApplications}}</small>
          <a href="{{ route('admin.camp-applications.index') }}" class="stretched-link"></a>
        </div>
        <div class="icon-circle bg-success">
          <i class="mdi mdi-clipboard-check-outline "></i>
        </div>
      </div>
    </div>
  </div> 

   <div class="col-md-3 mb-3">
    <div class="card shadow-sm position-relative">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <small class="text-muted">{{ __('admin.messages') }}</small>
          <h2 class="mb-0">{{ $messages }}</h2>
          <small class="text-danger">Unread: {{ $unreadMessages }}</small>
          <a href="{{ route('admin.contact-messages.index') }}" class="stretched-link"></a>
        </div>
        <div class="icon-circle bg-primary">
          <i class="mdi mdi-file-document-outline"></i>
        </div>
      </div>
    </div>
  </div> 
  <div class="col-md-3 mb-3">
    <div class="card shadow-sm position-relative">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <small class="text-muted">{{ __('admin.EHF_application') }}</small> 
          <h2 class="mb-0">{{ $application }}</h2>
          <small class="text-warning">Pending: {{ $pendingApplications}}</small>
          <a href="{{ route('admin.applications.index') }}" class="stretched-link"></a>
        </div>
        <div class="icon-circle bg-success">
          <i class="mdi mdi-clipboard-check-outline "></i>
        </div>
      </div>
    </div>
  </div> 
   <div class="col-md-3 mb-3">
    <div class="card shadow-sm position-relative">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <small class="text-muted">{{ __('admin.coaches') }}</small>
          <h2 class="mb-0">{{ $coaches }}</h2>
          <a href="{{ route('admin.coaches.index') }}" class="stretched-link"></a>
        </div>
        <div class="icon-circle bg-info">
          <i class="mdi mdi-account-tie"></i>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
