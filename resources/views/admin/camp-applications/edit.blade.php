@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Edit Application #{{ $campApplication->id }}</h4>
        <a href="{{ route('admin.camp-applications.index') }}" class="btn btn-light">Back</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.camp-applications.update', $campApplication) }}" method="POST">
                @csrf @method('PUT')

                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">First Name</label>
                        <input class="form-control" name="name" value="{{ old('name',$campApplication->name) }}" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Surname</label>
                        <input class="form-control" name="surname" value="{{ old('surname',$campApplication->surname) }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Father Name</label>
                        <input class="form-control" name="father_name" value="{{ old('father_name',$campApplication->father_name) }}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Age</label>
                        <input type="number" class="form-control" name="age" value="{{ old('age',$campApplication->age) }}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Phone</label>
                        <input class="form-control" name="phone" value="{{ old('phone',$campApplication->phone) }}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email',$campApplication->email) }}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Location</label>
                        <input class="form-control" name="location" value="{{ old('location',$campApplication->location) }}">
                    </div>
                    <div class="mb-3">
  <label class="form-label">ID Number</label>
  <input
    type="text"
    name="id_number"
    class="form-control"
    value="{{ old('id_number', $campApplication->id_number ?? '') }}"
    placeholder="1398-1100-55555"
  >
  <small class="text-muted">Example: 1398-1100-55555</small>
</div>


                    <div class="col-md-3">
                        <label class="form-label">Weight (kg)</label>
                        <input type="number" class="form-control" name="weight_kg" value="{{ old('weight_kg',$campApplication->weight_kg) }}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Session</label>
                        <select class="form-control" name="preferred_session">
                            @foreach(['morning','evening','both'] as $s)
                                <option value="{{ $s }}" @selected(old('preferred_session',$campApplication->preferred_session)==$s)>{{ ucfirst($s) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Discipline</label>
                        <input class="form-control" name="discipline" value="{{ old('discipline',$campApplication->discipline) }}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Level</label>
                        <select class="form-control" name="experience_level">
                            @foreach(['beginner','intermediate','pro'] as $l)
                                <option value="{{ $l }}" @selected(old('experience_level',$campApplication->experience_level)==$l)>{{ ucfirst($l) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Years</label>
                        <input type="number" class="form-control" name="experience_years" value="{{ old('experience_years',$campApplication->experience_years) }}">
                    </div>

                    <div class="col-md-9">
                        <label class="form-label">Social Link</label>
                        <input class="form-control" name="social_link" value="{{ old('social_link',$campApplication->social_link) }}">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" name="message" rows="3">{{ old('message',$campApplication->message) }}</textarea>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="status" required>
                            @foreach(['pending','approved','rejected'] as $st)
                                <option value="{{ $st }}" @selected(old('status',$campApplication->status)==$st)>{{ ucfirst($st) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mt-3">
                    <button class="btn btn-primary">Save Changes</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
