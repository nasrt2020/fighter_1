@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Coaches</h1>

    <a href="{{ route('admin.coaches.create') }}" class="btn btn-primary mb-3">
        + Add Coach
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Role</th>
                <th>Experience</th>
                <th>Status</th>
                <th style="width:220px;">Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($coaches as $coach)
            <tr>
                <td>{{ $coach->id }}</td>
                <td>{{ $coach->name }}</td>
                <td>{{ $coach->role }}</td>
                <td>{{ $coach->experience_years }} yrs</td>
                <td>
                    @if($coach->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.coaches.show', $coach) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('admin.coaches.edit', $coach) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.coaches.toggle', $coach->id) }}" method="POST" style="display:inline-block;">
    @csrf
    <button class="btn btn-sm {{ $coach->is_active ? 'btn-warning' : 'btn-success' }}">
        {{ $coach->is_active ? 'Deactivate' : 'Activate' }}
    </button>
</form>


                    <form action="{{ route('admin.coaches.destroy', $coach) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this coach?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No coaches found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    

    {{ $coaches->links() }}
</div>
@endsection
