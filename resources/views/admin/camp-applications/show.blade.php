@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Application #{{ $campApplication->id }}</h4>
        <a href="{{ route('admin.camp-applications.index') }}" class="btn btn-light">Back</a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-4">
                    @if($campApplication->photo_path)
                        <img src="{{ asset('storage/'.$campApplication->photo_path) }}" class="img-fluid rounded" alt="photo">
                    @else
                        <div class="text-muted">No photo</div>
                    @endif
                </div>

                <div class="col-md-8">
                    <p class="mb-1"><strong>Name:</strong> {{ $campApplication->name }} {{ $campApplication->surname }}</p>
                    <p class="mb-1"><strong>Father:</strong> {{ $campApplication->father_name }}</p>
                    <p class="mb-1"><strong>Age:</strong> {{ $campApplication->age }}</p>
                    <p class="mb-1"><strong>Phone:</strong> {{ $campApplication->phone }}</p>
                    <p class="mb-1"><strong>Email:</strong> {{ $campApplication->email }}</p>
                    <p class="mb-1"><strong>Location:</strong> {{ $campApplication->location }}</p>
                    <p><strong>ID Number:</strong> {{ $campApplication->id_number ?? '—' }}</p>
                    <p class="mb-1"><strong>Weight:</strong> {{ $campApplication->weight_kg }} kg</p>
                    <p class="mb-1"><strong>Session:</strong> {{ $campApplication->preferred_session }}</p>
                    <p class="mb-1"><strong>Discipline:</strong> {{ $campApplication->discipline }}</p>
                    <p class="mb-1"><strong>Experience:</strong> {{ $campApplication->experience_level }} ({{ $campApplication->experience_years }} yrs)</p>
                    <p class="mb-1"><strong>Social:</strong> {{ $campApplication->social_link }}</p>
                    <p class="mb-0"><strong>Status:</strong> {{ ucfirst($campApplication->status) }}</p>
                </div>

                <div class="col-12">
                    <hr>
                    <h6>Message</h6>
                    <p class="mb-0">{{ $campApplication->message }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
