{{-- admin/camps/_form.blade.php --}}
@csrf

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label>Day</label>
            <select name="day" class="form-control" required>
                @php
                    $days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
                @endphp
                @foreach($days as $day)
                    <option value="{{ $day }}"
                        @selected(old('day', $camp->day ?? '') == $day)>
                        {{ $day }}
                    </option>
                @endforeach
            </select>
            @error('day') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Session</label>
            <select name="session" class="form-control" required>
                <option value="morning" @selected(old('session', $camp->session ?? '') == 'morning')>
                    Morning
                </option>
                <option value="evening" @selected(old('session', $camp->session ?? '') == 'evening')>
                    Evening
                </option>
            </select>
            @error('session') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Title</label>
            <input type="text"
                   name="title"
                   class="form-control"
                   value="{{ old('title', $camp->title ?? '') }}"
                   placeholder="Striking & Cardio"
                   required>
            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>Start Time</label>
            <input type="time"
                   name="start_time"
                   class="form-control"
                   value="{{ old('start_time', $camp->start_time ?? '') }}"
                   required>
            @error('start_time') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>End Time</label>
            <input type="time"
                   name="end_time"
                   class="form-control"
                   value="{{ old('end_time', $camp->end_time ?? '') }}"
                   required>
            @error('end_time') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

<div class="col-md-3 d-flex align-items-center">
    <div class="form-check mt-4 pt-2">

        <!-- Hidden input ensures 0 is always sent when unchecked -->
        <input type="hidden" name="is_active" value="0">

        <input type="checkbox"
               name="is_active"
               value="1"
               class="form-check-input"
               {{ old('is_active', $camp->is_active ?? 1) ? 'checked' : '' }}>
               
        <label class="form-check-label">
            Active (show on website)
        </label>
    </div>
</div>


<div class="mt-3">
    <button type="submit" class="btn btn-primary me-2">
        Save
    </button>
    <a href="{{ route('admin.camps.index') }}" class="btn btn-light">Cancel</a>
</div>
