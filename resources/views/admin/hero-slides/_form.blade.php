@csrf

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text"
                   name="title"
                   class="form-control"
                   value="{{ old('title', $slide->title ?? '') }}"
                   required>
            @error('title')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Subtitle</label>
            <input type="text"
                   name="subtitle"
                   class="form-control"
                   value="{{ old('subtitle', $slide->subtitle ?? '') }}">
            @error('subtitle')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="mb-3">
            <label class="form-label">Button Text</label>
            <input type="text"
                   name="button_text"
                   class="form-control"
                   value="{{ old('button_text', $slide->button_text ?? 'Train With Us') }}">
            @error('button_text')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="mb-3">
            <label class="form-label">Button Link</label>
            <input type="text"
                   name="button_link"
                   class="form-control"
                   value="{{ old('button_link', $slide->button_link ?? '#joinTeamForm') }}">
            @error('button_link')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
    </div>

    <div class="col-md-2">
        <div class="mb-3">
            <label class="form-label">Overlay (0–9)</label>
            <input type="number"
                   name="overlay"
                   class="form-control"
                   value="{{ old('overlay', $slide->overlay ?? 6) }}"
                   min="0" max="9">
            @error('overlay')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
    </div>

    <div class="col-md-2">
        <div class="mb-3">
            <label class="form-label">Sort Order</label>
            <input type="number"
                   name="sort_order"
                   class="form-control"
                   value="{{ old('sort_order', $slide->sort_order ?? 0) }}"
                   min="0">
            @error('sort_order')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Background Image</label>
            <input type="file" name="image" class="form-control">
            @if(!empty($slide->image_path))
                <div class="mt-2">
                    <img src="{{ asset('storage/'.$slide->image_path) }}"
                         alt="Current image"
                         style="height:80px;border-radius:4px;">
                </div>
            @endif
            @error('image')<small class="text-danger">{{ $message }}</small>@enderror
        </div>
    </div>

    <div class="col-md-3 d-flex align-items-center">
        <div class="form-check mt-4">
            <input type="checkbox"
                   class="form-check-input"
                   id="is_active"
                   name="is_active"
                   {{ old('is_active', $slide->is_active ?? true) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">
                Active (show in carousel)
            </label>
        </div>
    </div>
</div>

<div class="mt-3">
    <button class="btn btn-primary me-2" type="submit">Save</button>
    <a href="{{ route('admin.hero-slides.index') }}" class="btn btn-light">Cancel</a>
</div>
