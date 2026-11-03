@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Challenge / Booking Requests</h4>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Filters --}}
    <form class="card card-body mb-3" method="GET" action="{{ route('admin.challenge-requests.index') }}">
        <div class="row g-2">
            <div class="col-md-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="">All</option>
                    @foreach(['new','in_review','accepted','rejected','completed'] as $s)
                        <option value="{{ $s }}" @selected(($status ?? '') === $s)>{{ ucfirst(str_replace('_',' ', $s)) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Type</label>
                <select name="type" class="form-control">
                    <option value="">All</option>
                    @foreach(['challenge','sparring','booking'] as $t)
                        <option value="{{ $t }}" @selected(($type ?? '') === $t)>{{ ucfirst($t) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 d-flex align-items-end">
                <button class="btn btn-primary me-2" type="submit">Filter</button>
                <a class="btn btn-light" href="{{ route('admin.challenge-requests.index') }}">Reset</a>
            </div>
        </div>
    </form>

    {{-- Table --}}
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>EHF Fighter</th>
                        <th>Challenger</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Contact</th>
                        <th>Created</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($requests as $r)
                        <tr>
                            <td>{{ $r->id }}</td>
                            <td>
                                <div class="fw-semibold">{{ $r->ehfFighter?->name ?? '-' }}</div>
                                <small class="text-muted">{{ $r->ehfFighter?->weight_class ?? '' }}</small>
                            </td>
                            <td>
                                <div class="fw-semibold">{{ $r->challenger_name }}</div>
                                <small class="text-muted">{{ $r->challenger_weight_kg }}kg • {{ $r->challenger_weight_class ?? '—' }}</small>
                            </td>
                            <td>
                                <span class="badge bg-info text-dark">{{ $r->type }}</span>
                            </td>
                            <td>
                                @php
                                    $map = [
                                        'new' => 'bg-warning text-dark',
                                        'in_review' => 'bg-primary',
                                        'accepted' => 'bg-success',
                                        'rejected' => 'bg-danger',
                                        'completed' => 'bg-secondary',
                                    ];
                                @endphp
                                <span class="badge {{ $map[$r->status] ?? 'bg-light text-dark' }}">
                                    {{ ucfirst(str_replace('_',' ', $r->status)) }}
                                </span>
                            </td>
                            <td>
                                <div>{{ $r->contact_name }}</div>
                                <small class="text-muted">{{ $r->email }}</small>
                            </td>
                            <td>{{ $r->created_at?->format('Y-m-d') }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.challenge-requests.show', $r) }}" class="btn btn-sm btn-outline-primary">
                                    View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">No requests found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                {{ $requests->links() }}
            </div>
        </div>
    </div>

</div>
@endsection
