@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Camps / Training Schedule </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Camps</li>
            </ol>
        </nav>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="card-title mb-0">All Camp Sessions</h4>
                <a href="{{ route('admin.camps.create') }}" class="btn btn-primary btn-sm">
                    <i class="mdi mdi-plus-circle"></i> Add Session
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>Session</th>
                            <th>Title</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th width="150">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($camps as $camp)
                            <tr>
                                <td>{{ $camp->day }}</td>
                                <td>{{ ucfirst($camp->session) }}</td>
                                <td>{{ $camp->title }}</td>
                                <td>{{ \Carbon\Carbon::parse($camp->start_time)->format('H:i') }}
                                    –
                                    {{ \Carbon\Carbon::parse($camp->end_time)->format('H:i') }}
                                </td>
                                <td>
                                    @if($camp->is_active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-secondary">Hidden</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.camps.edit', $camp) }}"
                                       class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.camps.destroy', $camp) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Delete this session?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    No camp sessions yet. Click “Add Session” to create one.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
