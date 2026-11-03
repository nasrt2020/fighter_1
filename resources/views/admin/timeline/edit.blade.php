@extends('admin.layouts.app')

@section('title', 'Edit Timeline Event')

@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title mb-0">Edit Timeline Event</h4>
            <a href="{{ route('admin.timeline-events.index') }}" class="btn btn-light btn-sm">Back</a>
          </div>

          @if ($errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('admin.timeline-events.update', $event) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label>Year Label</label>
              <input type="text" name="year_label" class="form-control"
                     placeholder="2017 – EHF Concept Born"
                     value="{{ old('year_label', $event->year_label) }}">
            </div>

            <div class="form-group">
              <label>Title *</label>
              <input type="text" name="title" class="form-control"
                     value="{{ old('title', $event->title) }}" required>
            </div>

            <div class="form-group">
              <label>Description</label>
              <textarea name="description" class="form-control" rows="3">{{ old('description', $event->description) }}</textarea>
            </div>

            <div class="form-group">
              <label>Image Path</label>
              <input type="text" name="image_path" class="form-control"
                     placeholder="Front/img/video/fighter1.jpg"
                     value="{{ old('image_path', $event->image_path) }}">
            </div>

            <div class="form-group">
              <label>Side</label>
              <select name="side" class="form-control">
                <option value="left"  {{ old('side', $event->side) == 'left' ? 'selected' : '' }}>Left</option>
                <option value="right" {{ old('side', $event->side) == 'right' ? 'selected' : '' }}>Right</option>
              </select>
            </div>

            <div class="form-group">
              <label>Sort Order</label>
              <input type="number" name="sort_order" class="form-control"
                     value="{{ old('sort_order', $event->sort_order) }}">
            </div>

            <div class="form-check mb-3">
              <label class="form-check-label">
                <input type="checkbox" name="is_active" class="form-check-input"
                       {{ old('is_active', $event->is_active) ? 'checked' : '' }}>
                Active (show on website)
              </label>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.timeline-events.index') }}" class="btn btn-light">Cancel</a>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
