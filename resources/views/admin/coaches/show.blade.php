@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Coach Details</h1>

    <div class="d-flex gap-2 mb-3">
        <a href="{{ route('admin.coaches.index') }}" class="btn btn-secondary">← Back</a>
        <a href="{{ route('admin.coaches.edit', $coach->id) }}" class="btn btn-primary">Edit</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card p-4" style="background:#111827;color:#fff;border:1px solid #222;">
        <div class="row g-4 align-items-start">
            <div class="col-md-4">
                @if(!empty($coach->photo_path))
                    <img src="{{ asset('storage/'.$coach->photo_path) }}"
                         alt="Coach Photo"
                         style="width:100%;border-radius:14px;border:1px solid #333;object-fit:cover;">
                @else
                    <div class="text-muted">No photo uploaded.</div>
                @endif
            </div>

            <div class="col-md-8">
                <h3 class="mb-3">{{ $coach->name }}</h3>

                <p class="mb-2"><strong>Role:</strong> {{ $coach->role }}</p>
                <p class="mb-2"><strong>Experience:</strong> {{ $coach->experience_years }} years</p>
                <p class="mb-2"><strong>Specialties:</strong> {{ $coach->specialties ?? '—' }}</p>
                <p class="mb-2">
                    <strong>Status:</strong>
                    @if($coach->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </p>

                <p class="mb-0 text-muted">
                    <strong>Created:</strong> {{ optional($coach->created_at)->format('Y-m-d') }}
                </p>
            </div>
        </div>

        <hr style="border-color:#222;" class="my-4">

        <div class="d-flex flex-wrap gap-2">
            <!-- Toggle Active -->
            <form action="{{ route('admin.coaches.toggle', $coach->id) }}" method="POST">
                @csrf
                <button class="btn {{ $coach->is_active ? 'btn-warning' : 'btn-success' }}">
                    {{ $coach->is_active ? 'Deactivate' : 'Activate' }}
                </button>
            </form>

            <!-- Delete -->
            <form action="{{ route('admin.coaches.destroy', $coach->id) }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this coach?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
