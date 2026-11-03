@extends('admin.layouts.app')

@section('content')
<div class="page-header">
    <h3 class="page-title">Hero Slides</h3>
    <a href="{{ route('admin.hero-slides.create') }}" class="btn btn-primary btn-sm">
        + Add Slide
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Order</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($slides as $slide)
                    <tr>
                        <td>{{ $slide->id }}</td>
                        <td>
                            @if($slide->image_path)
                                <img src="{{ asset('storage/'.$slide->image_path) }}"
                                     alt="{{ $slide->title }}"
                                     style="height:50px;border-radius:4px;">
                            @endif
                        </td>
                        <td>{{ $slide->title }}</td>
                        <td>{{ $slide->subtitle }}</td>
                        <td>{{ $slide->sort_order }}</td>
                        <td>
                            @if($slide->is_active)
                                <span class="badge bg-success">Yes</span>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.hero-slides.edit', $slide) }}"
                               class="btn btn-sm btn-outline-info me-1">
                                Edit
                            </a>
                            <form action="{{ route('admin.hero-slides.destroy', $slide) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Delete this slide?')">
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
                        <td colspan="7" class="text-center text-muted">
                            No slides added yet.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
