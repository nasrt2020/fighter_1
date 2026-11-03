@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Contact Messages</h4>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th style="width:220px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $msg)
                            <tr>
                                <td>{{ $msg->id }}</td>
                                <td>
                                    @if($msg->is_read)
                                        <span class="badge bg-success">Read</span>
                                    @else
                                        <span class="badge bg-warning text-dark">New</span>
                                    @endif
                                </td>
                                <td>{{ $msg->name }}</td>
                                <td>{{ $msg->email }}</td>
                                <td>{{ $msg->subject }}</td>
                                <td>{{ $msg->phone ?? '-' }}</td>
                                <td>{{ $msg->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.contact-messages.show', $msg->id) }}" class="btn btn-sm btn-primary">View</a>

                                    @if(!$msg->is_read)
                                        <form action="{{ route('admin.contact-messages.read', $msg->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn btn-sm btn-success">Mark Read</button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.contact-messages.unread', $msg->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn btn-sm btn-secondary">Unread</button>
                                        </form>
                                    @endif

                                    <form action="{{ route('admin.contact-messages.destroy', $msg->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this message?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No messages found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $messages->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
