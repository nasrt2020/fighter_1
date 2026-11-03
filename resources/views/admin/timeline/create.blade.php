@extends('admin.layouts.app')

@section('title', 'Create Timeline Event')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create Timeline Event</h4>

                    <form action="{{ route('admin.timeline-events.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Year Label</label>
                            <input type="text" name="year_label" class="form-control"
                                   placeholder="2017 – EHF Concept Born"
                                   value="{{ old('year_label') }}">
                        </div>

                        <div class="form-group">
                            <label>Title *</label>
                            <input type="text" name="title" class="form-control"
                                   value="{{ old('title') }}" required>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Image Path</label>
                            <input type="text" name="image_path" class="form-control"
                                   placeholder="Front/img/video/fighter1.jpg"
                                   value="{{ old('image_path') }}">
                        </div>

                        <div class="form-group">
                            <label>Side</label>
                            <select name="side" class="form-control">
                                <option value="left" {{ old('side') == 'left' ? 'selected' : '' }}>Left</option>
                                <option value="right" {{ old('side') == 'right' ? 'selected' : '' }}>Right</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Sort Order</label>
                            <input type="number" name="sort_order" class="form-control"
                                   value="{{ old('sort_order', 0) }}">
                        </div>

                        <div class="form-check mb-3">
                            <label class="form-check-label">
                                <input type="checkbox" name="is_active" class="form-check-input"
                                       {{ old('is_active', true) ? 'checked' : '' }}>
                                Active (show on website)
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('admin.timeline-events.index') }}" class="btn btn-light">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
