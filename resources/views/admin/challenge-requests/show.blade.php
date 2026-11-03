@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="mb-0">Request #{{ $req->id }}</h4>
            <small class="text-muted">
                Submitted: {{ $req->created_at?->format('Y-m-d H:i') }}
            </small>
        </div>

        <a href="{{ route('admin.challenge-requests.index') }}" class="btn btn-light">
            Back
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row g-3">

        {{-- Left: Main info --}}
        <div class="col-lg-8">

            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="mb-3">EHF Fighter</h5>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="fw-semibold">{{ $req->ehfFighter?->name ?? '-' }}</div>
                            <small class="text-muted">
                                {{ $req->ehfFighter?->weight_class ?? '' }}
                                {{ $req->ehfFighter?->weight_kg ? '• '.$req->ehfFighter->weight_kg.'kg' : '' }}
                            </small>
                        </div>
                        <span class="badge bg-dark">{{ $req->type }}</span>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="mb-3">Challenger Fighter</h5>

                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="text-muted small">Name</div>
                            <div class="fw-semibold">{{ $req->challenger_name }}</div>
                               <div class="text-muted small">Age</div>
                            <div class="fw-semibold">{{ $req->challenger_age }}</div>
                        </div>

                       

                        <div class="col-md-6">
                            <div class="text-muted small">Record</div>
                            <div class="fw-semibold">
                                {{ $req->record_wins }}-{{ $req->record_losses }}-{{ $req->record_draws }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="text-muted small">Weight</div>
                            <div class="fw-semibold">{{ $req->challenger_weight_kg }} kg</div>
                        </div>

                        <div class="col-md-6">
                            <div class="text-muted small">Weight Class</div>
                            <div class="fw-semibold">{{ $req->challenger_weight_class ?? '—' }}</div>
                        </div>

                        @if($req->profile_link)
                            <div class="col-12">
                                <div class="text-muted small">Profile Link</div>
                                <a href="{{ $req->profile_link }}" target="_blank">{{ $req->profile_link }}</a>
                            </div>
                        @endif

                        @if($req->photo_path)
                            <div class="col-12 mt-2">
                                <img src="{{ asset('storage/'.$req->photo_path) }}"
                                     style="max-width:220px;border-radius:12px;"
                                     alt="Challenger photo">
                            </div>
                        @endif
                    </div>

                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="mb-3">Request Details</h5>

                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="text-muted small">Preferred Date From</div>
                            <div class="fw-semibold">{{ $req->preferred_date_from ?? '—' }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-muted small">Preferred Date To</div>
                            <div class="fw-semibold">{{ $req->preferred_date_to ?? '—' }}</div>
                        </div>
                        <div class="col-12">
                            <div class="text-muted small">Location Preference</div>
                            <div class="fw-semibold">{{ $req->location_preference ?? '—' }}</div>
                        </div>
                        <div class="col-12">
                            <div class="text-muted small">Message</div>
                            <div class="border rounded p-3">{{ $req->message }}</div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        {{-- Right: Contact + Status --}}
        <div class="col-lg-4">

            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="mb-3">Contact</h5>

                    <div class="mb-2">
                        <div class="text-muted small">Organization</div>
                        <div class="fw-semibold">{{ $req->org_name ?? '—' }}</div>
                    </div>

                    <div class="mb-2">
                        <div class="text-muted small">Contact Name</div>
                        <div class="fw-semibold">{{ $req->contact_name }}</div>
                    </div>

                    <div class="mb-2">
                        <div class="text-muted small">Email</div>
                        <div class="fw-semibold">{{ $req->email }}</div>
                    </div>

                    <div class="mb-2">
                        <div class="text-muted small">Phone</div>
                        <div class="fw-semibold">{{ $req->phone ?? '—' }}</div>
                    </div>

                    <div class="mb-0">
                        <div class="text-muted small">Country / City</div>
                        <div class="fw-semibold">{{ $req->country ?? '—' }} {{ $req->city ? '• '.$req->city : '' }}</div>
                    </div>
                </div>
            </div>

            {{-- Status update --}}
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="mb-3">Status</h5>

                    <form method="POST" action="{{ route('admin.challenge-requests.update', $req) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-2">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control" required>
                                @foreach(['new','in_review','accepted','rejected','completed'] as $s)
                                    <option value="{{ $s }}" @selected($req->status === $s)>
                                        {{ ucfirst(str_replace('_',' ', $s)) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Admin Notes</label>
                            <textarea name="admin_notes" rows="4" class="form-control">{{ old('admin_notes', $req->admin_notes) }}</textarea>
                            @error('admin_notes') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <button class="btn btn-primary w-100" type="submit">Update</button>
                    </form>
                </div>
            </div>

            {{-- Delete --}}
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.challenge-requests.destroy', $req) }}"
                          onsubmit="return confirm('Delete this request?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger w-100" type="submit">Delete</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
