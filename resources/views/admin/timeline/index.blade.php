@extends('admin.layouts.app')

@section('title', 'Timeline Events')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title">Timeline Events</h4>
                        <a href="{{ route('admin.timeline-events.create') }}" class="btn btn-primary btn-sm">
                            + Add Event
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Year Label</th>
                                    <th>Title</th>
                                    <th>Side</th>
                                    <th>Order</th>
                                    <th>Active</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($events as $event)
                                    <tr>
                                        <td>{{ $event->id }}</td>
                                        <td>{{ $event->year_label }}</td>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ ucfirst($event->side) }}</td>
                                        <td>{{ $event->sort_order }}</td>
                                        <td>
                                            @if($event->is_active)
                                                <span class="badge bg-success">Yes</span>
                                            @else
                                                <span class="badge bg-secondary">No</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('admin.timeline-events.edit', $event) }}" class="btn btn-sm btn-outline-info">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.timeline-events.destroy', $event) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Delete this event?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No timeline events yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
