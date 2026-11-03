@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Message #{{ $contactMessage->id }}</h4>
        <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-secondary">Back</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <p><strong>Name:</strong> {{ $contactMessage->name }}</p>
            <p><strong>Email:</strong> {{ $contactMessage->email }}</p>
            <p><strong>Subject:</strong> {{ $contactMessage->subject }}</p>
            <p><strong>Phone:</strong> {{ $contactMessage->phone ?? '-' }}</p>
            <p><strong>Date:</strong> {{ $contactMessage->created_at->format('Y-m-d H:i') }}</p>

            <hr>

            <p><strong>Message:</strong></p>
            <div class="p-3 rounded bg-dark text-white" style="white-space: pre-wrap;">
                {{ $contactMessage->message }}
            </div>

            <hr>

            <div class="d-flex gap-2">
                @if(!$contactMessage->is_read)
                    <form action="{{ route('admin.contact-messages.read', $contactMessage->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-success">Mark Read</button>
                    </form>
                @else
                    <form action="{{ route('admin.contact-messages.unread', $contactMessage->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-secondary">Mark Unread</button>
                    </form>
                @endif

                <form action="{{ route('admin.contact-messages.destroy', $contactMessage->id) }}" method="POST" onsubmit="return confirm('Delete this message?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
