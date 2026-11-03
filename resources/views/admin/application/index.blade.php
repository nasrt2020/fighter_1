@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title mb-0">Fighter Applications</h4>
                </div>

                @if(session('success'))
                    <div class="alert alert-success mb-3">
                        {{ session('success') }}
                    </div>
                @endif

                @if($applications->isEmpty())
                    <p class="text-muted mb-0">No applications submitted yet.</p>
                @else
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Applicant</th>
                                <th>Age</th>
                                <th>Nationality</th>
                                <th>Weight Class</th>
                                <th>Status</th>
                                <th>Submitted At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($applications as $application)
                                <tr>
                                    <td>{{ $application->id }}</td>
                                    <td>
                                        <strong>{{ $application->first_name }} {{ $application->last_name }}</strong>
                                    </td>
                                    <td>{{ $application->age ?? '—' }}</td>
                                    <td>{{ $application->nationality ?? '—' }}</td>
                                    <td>{{ $application->weight_class ?? '—' }}</td>
                                    <td>
                                        @php
                                            $badgeClass = [
                                                'pending'  => 'badge-warning',
                                                'reviewed' => 'badge-info',
                                                'accepted' => 'badge-success',
                                                'rejected' => 'badge-danger',
                                            ][$application->status] ?? 'badge-secondary';
                                        @endphp
                                        <span class="badge {{ $badgeClass }}">
                                            {{ ucfirst($application->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $application->created_at->format('Y-m-d H:i') }}</td>
                                    <td class="d-flex gap-2">
                                        <a href="{{ route('admin.applications.show', $application) }}"
                                           class="btn btn-sm btn-outline-primary me-1">
                                            View
                                        </a>

                                        <form action="{{ route('admin.applications.destroy', $application) }}"
                                              method="POST"
                                              onsubmit="return confirm('Delete this application?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $applications->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
