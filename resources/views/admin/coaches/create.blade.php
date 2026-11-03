@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Add New Coach</h1>

    <a href="{{ route('admin.coaches.index') }}" class="btn btn-secondary mb-3">
        ← Back to Coaches
    </a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.coaches.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <!-- Role -->
        <div class="mb-3">
            <label class="form-label">Role</label>
            <input type="text" name="role" class="form-control" required value="{{ old('role') }}">
        </div>

        <!-- Experience -->
        <div class="mb-3">
            <label class="form-label">Experience (years)</label>
            <input type="number" name="experience_years" class="form-control" min="0" required value="{{ old('experience_years') }}">
        </div>

        <!-- Specialties -->
        <div class="mb-3">
            <label class="form-label">Specialties (comma separated)</label>
            <input type="text" name="specialties" class="form-control"
                   placeholder="MMA, Boxing, Conditioning"
                   value="{{ old('specialties') }}">
        </div>
<div class="mb-3">
  <label class="form-label">Primary Specialty</label>
  <input type="text" class="form-control" name="primary_specialty"
         value="{{ old('primary_specialty', $coach->primary_specialty ?? '') }}"
         placeholder="Striking">
</div>

<div class="mb-3">
  <label class="form-label">Other Specialties (comma separated)</label>
  <input type="text" class="form-control" name="other_specialties"
         value="{{ old('other_specialties', $coach->other_specialties ?? '') }}"
         placeholder="Boxing, MMA Strategy, Clinch">
</div>

<div class="mb-3">
  <label class="form-label">Bio</label>
  <textarea class="form-control" name="bio" rows="4"
            placeholder="Short bio...">{{ old('bio', $coach->bio ?? '') }}</textarea>
</div>

<hr>

<div class="row">
  <div class="col-md-4 mb-3">
    <label class="form-label">Phone</label>
    <input type="text" class="form-control" name="phone"
           value="{{ old('phone', $coach->phone ?? '') }}">
  </div>
  <div class="col-md-4 mb-3">
    <label class="form-label">Email</label>
    <input type="email" class="form-control" name="email"
           value="{{ old('email', $coach->email ?? '') }}">
  </div>
  <div class="col-md-4 mb-3">
    <label class="form-label">WhatsApp</label>
    <input type="text" class="form-control" name="whatsapp"
           value="{{ old('whatsapp', $coach->whatsapp ?? '') }}"
           placeholder="+93... or wa.me link">
  </div>
</div>

        <!-- Photo -->
        <div class="mb-3">
            <label class="form-label">Coach Photo</label>
            <input type="file" name="photo" class="form-control" accept="image/*">
        </div>

        <!-- Active -->
        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" name="is_active" checked>
            <label class="form-check-label">
                Active
            </label>
        </div>

        <button type="submit" class="btn btn-success">
            Save Coach
        </button>
    </form>
</div>
@endsection
