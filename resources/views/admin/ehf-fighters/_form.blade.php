@csrf

<div class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Name *</label>
    <input type="text" name="name" class="form-control"
           value="{{ old('name', $fighter->name ?? '') }}" required>
  </div>

  <div class="col-md-6">
    <label class="form-label">Nickname</label>
    <input type="text" name="nickname" class="form-control"
           value="{{ old('nickname', $fighter->nickname ?? '') }}">
  </div>

  <div class="col-md-3">
    <label class="form-label">Age</label>
    <input type="number" name="age" class="form-control"
           value="{{ old('age', $fighter->age ?? '') }}" min="0">
  </div>

  <div class="col-md-3">
    <label class="form-label">Weight (kg)</label>
    <input type="number" name="weight_kg" class="form-control"
           value="{{ old('weight_kg', $fighter->weight_kg ?? '') }}" min="0">
  </div>

  <div class="col-md-6">
    <label class="form-label">Weight Class</label>
    <input type="text" name="weight_class" class="form-control"
           value="{{ old('weight_class', $fighter->weight_class ?? '') }}"
           placeholder="Lightweight / Welterweight ...">
  </div>

  <div class="col-md-2">
    <label class="form-label">Wins</label>
    <input type="number" name="wins" class="form-control"
           value="{{ old('wins', $fighter->wins ?? 0) }}" min="0">
  </div>

  <div class="col-md-2">
    <label class="form-label">Losses</label>
    <input type="number" name="losses" class="form-control"
           value="{{ old('losses', $fighter->losses ?? 0) }}" min="0">
  </div>

  <div class="col-md-2">
    <label class="form-label">Draws</label>
    <input type="number" name="draws" class="form-control"
           value="{{ old('draws', $fighter->draws ?? 0) }}" min="0">
  </div>

  <div class="col-md-2">
    <label class="form-label">Country (2 letters)</label>
    <input type="text" name="country_code" class="form-control"
           value="{{ old('country_code', $fighter->country_code ?? '') }}"
           placeholder="AF" maxlength="2">
  </div>

  <div class="col-md-6">
    <label class="form-label">Photo</label>
    <input type="file" name="photo" class="form-control">

    @if(!empty($fighter?->photo_path))
      <div class="mt-2">
        <img src="{{ asset('storage/'.$fighter->photo_path) }}" alt="photo"
             style="width:80px;height:80px;object-fit:cover;border-radius:10px;">
      </div>
    @endif
  </div>

  <div class="col-md-6 d-flex align-items-end">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
        {{ old('is_active', $fighter->is_active ?? true) ? 'checked' : '' }}>
      <label class="form-check-label" for="is_active">Active (show on website)</label>
    </div>
  </div>

  <div class="col-12">
    <label class="form-label">Short Bio (one line)</label>
    <textarea name="short_bio" class="form-control" rows="2">{{ old('short_bio', $fighter->short_bio ?? '') }}</textarea>
  </div>

  <div class="col-12">
    <label class="form-label">Full Bio (profile)</label>
    <textarea name="full_bio" class="form-control" rows="6">{{ old('full_bio', $fighter->full_bio ?? '') }}</textarea>
  </div>
</div>

<div class="mt-4 d-flex gap-2">
  <button class="btn btn-primary" type="submit">Save</button>
  <a href="{{ route('admin.ehf-fighters.index') }}" class="btn btn-light">Cancel</a>
</div>
