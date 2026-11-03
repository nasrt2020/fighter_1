@extends('admin.layouts.app') {{-- adjust layout name to your admin layout --}}

@section('content')
<div class="container">

  <h3 class="mb-3">Upcoming Fight Settings</h3>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  {{-- MAIN SETTINGS --}}
  <form method="POST" action="{{ route('admin.upcomingFight.update') }}" class="card p-3 mb-4">
    @csrf

    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ $fight->is_active ? 'checked' : '' }}>
      <label class="form-check-label" for="is_active">Enable Upcoming Fight section</label>
    </div>

    <div class="row">
      <div class="col-md-3 mb-3">
        <label class="form-label">Fight Date</label>
        <input type="date" name="fight_date" class="form-control" value="{{ $fight->fight_date }}">
      </div>

      <div class="col-md-3 mb-3">
        <label class="form-label">Active Until (optional)</label>
        <input type="date" name="active_until" class="form-control" value="{{ $fight->active_until }}">
        <small class="text-muted">After this date the section hides automatically.</small>
      </div>

      <div class="col-md-3 mb-3">
        <label class="form-label">Venue</label>
        <input type="text" name="venue" class="form-control" value="{{ $fight->venue }}">
      </div>

      <div class="col-md-3 mb-3">
        <label class="form-label">Weight Class</label>
        <input type="text" name="weight_class" class="form-control" value="{{ $fight->weight_class }}">
      </div>
    </div>

    <button class="btn btn-primary">Save Settings</button>
  </form>

  {{-- ADD SLIDE --}}
  <h4 class="mb-2">Add Carousel Slide</h4>

  <form method="POST" action="{{ route('admin.upcomingFight.slides.store') }}" enctype="multipart/form-data" class="card p-3 mb-4">
    @csrf

    <div class="row">
      <div class="col-md-6">
        <h5>Fighter 1</h5>

        <input class="form-control mb-2" name="fighter1_name" placeholder="Name">
        <input class="form-control mb-2" name="fighter1_record" placeholder="Record (W-L-D) e.g. 15-2-0">
        <input class="form-control mb-2" name="fighter1_flag" placeholder="Flag code e.g. ca, tr, af">
        <input class="form-control mb-2" name="fighter1_age" type="number" placeholder="Age">
        <input class="form-control mb-2" name="fighter1_height" placeholder="Height e.g. 180 cm">
        <input class="form-control mb-2" name="fighter1_weight" placeholder="Weight e.g. 77 kg">
        <input class="form-control mb-2" name="fighter1_reach" placeholder="Reach e.g. 185 cm">
        <input class="form-control mb-2" name="fighter1_image" type="file" accept="image/*">
      </div>

      <div class="col-md-6">
        <h5>Fighter 2</h5>

        <input class="form-control mb-2" name="fighter2_name" placeholder="Name">
        <input class="form-control mb-2" name="fighter2_record" placeholder="Record (W-L-D) e.g. 18-3-0">
        <input class="form-control mb-2" name="fighter2_flag" placeholder="Flag code e.g. gb, br, af">
        <input class="form-control mb-2" name="fighter2_age" type="number" placeholder="Age">
        <input class="form-control mb-2" name="fighter2_height" placeholder="Height e.g. 178 cm">
        <input class="form-control mb-2" name="fighter2_weight" placeholder="Weight e.g. 75 kg">
        <input class="form-control mb-2" name="fighter2_reach" placeholder="Reach e.g. 180 cm">
        <input class="form-control mb-2" name="fighter2_image" type="file" accept="image/*">
      </div>
    </div>

    <div class="row mt-2">
      <div class="col-md-3">
        <label class="form-label">Sort Order</label>
        <input class="form-control" name="sort_order" type="number" value="0">
      </div>
    </div>

    <button class="btn btn-success mt-3">Add Slide</button>
  </form>

  {{-- LIST SLIDES --}}
  <h4 class="mb-2">Slides</h4>

  <div class="card p-3">
    @if($fight->slides->count() == 0)
      <p class="mb-0 text-muted">No slides yet.</p>
    @else
      <div class="table-responsive">
        <table class="table table-dark table-striped align-middle">
          <thead>
            <tr>
              <th>#</th>
              <th>F1</th>
              <th>F2</th>
              <th>Order</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($fight->slides as $slide)
              <tr>
                <td>{{ $slide->id }}</td>
                <td>
                  <div>{{ $slide->fighter1_name }}</div>
                  @if($slide->fighter1_image)
                    <img src="{{ asset('storage/'.$slide->fighter1_image) }}" style="width:70px;height:50px;object-fit:cover;border-radius:6px;">
                  @endif
                </td>
                <td>
                  <div>{{ $slide->fighter2_name }}</div>
                  @if($slide->fighter2_image)
                    <img src="{{ asset('storage/'.$slide->fighter2_image) }}" style="width:70px;height:50px;object-fit:cover;border-radius:6px;">
                  @endif
                </td>
                <td>{{ $slide->sort_order }}</td>
                <td>
                  <form method="POST" action="{{ route('admin.upcomingFight.slides.delete', $slide) }}">
                    @csrf
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete slide?')">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endif
  </div>

</div>
@endsection
