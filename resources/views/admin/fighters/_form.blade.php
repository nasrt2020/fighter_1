@csrf

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Name *</label>
            <input type="text" name="name" class="form-control"
                   value="{{ old('name', $fighter->name ?? '') }}" required>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>Division</label>
            <input type="text" name="division" class="form-control"
                   value="{{ old('division', $fighter->division ?? '') }}">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>Stance</label>
            <input type="text" name="stance" class="form-control"
                   value="{{ old('stance', $fighter->stance ?? '') }}">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Wins</label>
            <input type="number" min="0" name="wins" class="form-control"
                   value="{{ old('wins', $fighter->wins ?? 0) }}">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Losses</label>
            <input type="number" min="0" name="losses" class="form-control"
                   value="{{ old('losses', $fighter->losses ?? 0) }}">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Draws</label>
            <input type="number" min="0" name="draws" class="form-control"
                   value="{{ old('draws', $fighter->draws ?? 0) }}">
        </div>
    </div>

    <div class="col-md-8">
        <div class="form-group">
            <label>Bio</label>
            <textarea name="bio" rows="4" class="form-control">{{ old('bio', $fighter->bio ?? '') }}</textarea>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Photo</label>
            <input type="file" name="photo" class="form-control">
            @if(!empty($fighter?->photo_path))
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $fighter->photo_path) }}"
                         alt="{{ $fighter->name }}"
                         style="width:80px; height:80px; border-radius:50%; object-fit:cover;">
                </div>
            @endif
        </div>

        <div class="form-group form-check mt-2">
            <input type="checkbox" name="is_featured" value="1" class="form-check-input"
                   id="is_featured"
                {{ old('is_featured', $fighter->is_featured ?? false) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_featured">Show as Key Fighter</label>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger mt-2">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mt-3">
    <button type="submit" class="btn btn-success me-2">Save</button>
    <a href="{{ route('admin.fighters.index') }}" class="btn btn-light">Cancel</a>
</div>
