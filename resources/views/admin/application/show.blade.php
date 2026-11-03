@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Application #{{ $application->id }}
                </h4>

                @if(session('success'))
                    <div class="alert alert-success mb-3">
                        {{ session('success') }}
                    </div>
                @endif

                <dl class="row">
                    <dt class="col-sm-4">Name</dt>
                    <dd class="col-sm-8">
                        {{ $application->first_name }} {{ $application->last_name }}
                    </dd>

                    <dt class="col-sm-4">Age</dt>
                    <dd class="col-sm-8">{{ $application->age ?? '—' }}</dd>

                    <dt class="col-sm-4">Nationality</dt>
                    <dd class="col-sm-8">{{ $application->nationality ?? '—' }}</dd>

                    <dt class="col-sm-4">Weight Class</dt>
                    <dd class="col-sm-8">{{ $application->weight_class ?? '—' }}</dd>

                    <dt class="col-sm-4">Experience</dt>
                    <dd class="col-sm-8">
                        @if($application->experience)
                            <p class="mb-0">{{ $application->experience }}</p>
                        @else
                            <span class="text-muted">No experience text provided.</span>
                        @endif
                    </dd>

                    <dt class="col-sm-4">Status</dt>
                    <dd class="col-sm-8">
                        <span class="badge badge-info">{{ ucfirst($application->status) }}</span>
                    </dd>

                    <dt class="col-sm-4">Submitted At</dt>
                    <dd class="col-sm-8">
                        {{ $application->created_at->format('Y-m-d H:i') }}
                    </dd>
                </dl>

                <hr>

                <form action="{{ route('admin.applications.update', $application) }}" method="POST" class="row g-2">
                    @csrf
                    @method('PUT')

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Update Status</label>
                            <select name="status" class="form-control" required>
                                @foreach(['pending','reviewed','accepted','rejected'] as $status)
                                    <option value="{{ $status }}"
                                        @selected($application->status === $status)>
                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary me-2">
                            Save Status
                        </button>

                        <a href="{{ route('admin.applications.index') }}" class="btn btn-light">
                            Back to list
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Optional: quick delete card --}}
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Danger Zone</h4>
                <p class="text-muted">Delete this application permanently.</p>

                <form action="{{ route('admin.applications.destroy', $application) }}"
                      method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this application?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger">
                        Delete Application
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
