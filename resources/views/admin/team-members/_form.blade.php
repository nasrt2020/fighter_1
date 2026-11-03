@csrf

<div class="row">
    <!-- Name -->
    <div class="col-md-6 mb-3">
        <label class="form-label">Name*</label>
        <input type="text" name="name" class="form-control"
               value="{{ old('name', $member->name ?? '') }}" required>
    </div>

    <!-- Role -->
    <div class="col-md-6 mb-3">
        <label class="form-label">Role</label>
        <input type="text" name="role" class="form-control"
               value="{{ old('role', $member->role ?? '') }}">
    </div>

    <!-- Upload Photo -->
    <div class="col-md-6 mb-3">
        <label class="form-label">Photo</label>
        <input type="file" name="photo" class="form-control">

        @if(!empty($member->photo_path))
            <div class="mt-2">
                <img src="{{ asset($member->photo_path) }}" width="80" class="rounded">
            </div>
        @endif
    </div>

    <!-- Sort Order -->
    <div class="col-md-3 mb-3">
        <label class="form-label">Sort Order</label>
        <input type="number" name="sort_order" class="form-control"
               value="{{ old('sort_order', $member->sort_order ?? 0) }}">
    </div>

    <!-- Owner -->
    <div class="col-md-3 mb-3">
        <label class="form-check-label d-block">Owner</label>
        <input type="checkbox" name="is_owner" class="form-check-input"
               {{ old('is_owner', $member->is_owner ?? false) ? 'checked' : '' }}>
    </div>

    <!-- Active -->
    <div class="col-md-3 mb-3">
        <label class="form-check-label d-block">Active</label>
        <input type="checkbox" name="is_active" class="form-check-input"
               {{ old('is_active', $member->is_active ?? true) ? 'checked' : '' }}>
    </div>

    <!-- Note -->
    <div class="col-12 mb-3">
        <label class="form-label">Short Description</label>
        <textarea name="note" class="form-control" rows="3">{{ old('note', $member->note ?? '') }}</textarea>
    </div>
</div>

<button class="btn btn-primary mt-3">Save</button>
<a href="{{ route('admin.team-members.index') }}" class="btn btn-secondary mt-3">Cancel</a>
