@extends('admin.layouts.app') {{-- use your real admin layout file name --}}

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Camp Fighter Applications</h4>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
<style>.table td, .table th {
  color: #e5e7eb !important;
}
.table-striped > tbody > tr:nth-of-type(odd) > * {
  color: #e5e7eb !important;
}
.table-striped > tbody > tr:nth-of-type(even) > * {
  color: #e5e7eb !important;
}
</style>
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Applicant</th>
                        <th>Phone</th>
                        <th>Weight</th>
                        <th>Discipline</th>
                        <th>Session</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($applications as $app)
                    <tr>
                        <td>{{ $app->id }}</td>
                        <td>
                            <div class="fw-semibold">
                                {{ $app->name }} {{ $app->surname }}
                            </div>
                            {{ $app->id_number }}

                            <small class="text-muted">
                                Age: {{ $app->age ?? '-' }} | {{ $app->location ?? '-' }}
                            </small>
                        </td>
                        <td>{{ $app->phone ?? '-' }}</td>
                        <td>{{ $app->weight_kg ? $app->weight_kg.' kg' : '-' }}</td>
                        <td>{{ $app->discipline ?? '-' }}</td>
                        <td>{{ $app->preferred_session ?? '-' }}</td>
                        <td>
                            @php
                                $badge = match($app->status){
                                    'approved' => 'success',
                                    'rejected' => 'danger',
                                    default => 'warning'
                                };
                            @endphp
                            <span class="badge bg-{{ $badge }}">{{ ucfirst($app->status) }}</span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.camp-applications.show', $app) }}" class="btn btn-sm btn-outline-primary">View</a>
                            <a href="{{ route('admin.camp-applications.edit', $app) }}" class="btn btn-sm btn-outline-secondary">Edit</a>

                        <form action="{{ route('admin.camp-applications.approve', $app->id) }}" method="POST" class="d-inline">
  @csrf
  <button class="btn btn-success btn-sm">Approve</button>
</form>

<form action="{{ route('admin.camp-applications.reject', $app->id) }}" method="POST" class="d-inline">
  @csrf
  <button class="btn btn-warning btn-sm">Deactivate</button>
</form>

                        </td>
                    </tr>
                @empty
                    <tr><td colspan="8" class="text-center text-muted py-4">No applications found.</td></tr>
                @endforelse
                </tbody>
            </table>

            {{ $applications->links() }}
        </div>
    </div>
</div>
@endsection
