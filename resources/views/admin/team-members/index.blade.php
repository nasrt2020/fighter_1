@extends('admin.layouts.app')

@section('title', 'Team Members')

@section('content')
<div class="content-wrapper">
    <div class="page-header d-flex justify-content-between align-items-center">
        <h3 class="page-title">EHF Team Members</h3>

        <a href="{{ route('admin.team-members.create') }}" class="btn btn-primary btn-icon-text">
            <i class="mdi mdi-account-plus btn-icon-prepend"></i>
            Add Member
        </a>
    </div>

    {{-- Flash success message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Team Members</h4>

            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Order</th>
                            <th>Owner</th>
                            <th>Active</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($members as $member)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                {{-- Photo preview --}}
                                <td>
                                    @if($member->photo_path)
                                        <img
                                            src="{{ asset($member->photo_path) }}"
                                            alt="{{ $member->name }}"
                                            width="50"
                                            class="rounded-circle"
                                        >
                                    @else
                                        <span class="text-muted small">No photo</span>
                                    @endif
                                </td>

                                <td>{{ $member->name }}</td>
                                <td>{{ $member->role ?? '-' }}</td>
                                <td>{{ $member->sort_order }}</td>

                                <td>
                                    @if($member->is_owner)
                                        <span class="badge bg-warning text-dark">Owner</span>
                                    @else
                                        <span class="badge bg-secondary">Member</span>
                                    @endif
                                </td>

                                <td>
                                    @if($member->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Hidden</span>
                                    @endif
                                </td>

                                <td class="text-end">
                                    <a
                                        href="{{ route('admin.team-members.edit', $member) }}"
                                        class="btn btn-sm btn-outline-info me-1"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.team-members.destroy', $member) }}"
                                        method="POST"
                                        class="d-inline-block"
                                        onsubmit="return confirm('Delete this member?');"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">
                                    No team members added yet.
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
