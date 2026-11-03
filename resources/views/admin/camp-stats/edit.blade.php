@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
  <h3 class="mb-4">Camp CTA Stats</h3>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <form method="POST" action="{{ route('admin.camp-stats.update') }}">
    @csrf
    @method('PUT')

    <div class="row">
      <div class="col-md-4 mb-3">
        <label class="form-label">Fighters Trained</label>
        <input type="number" class="form-control" name="fighters_trained" value="{{ old('fighters_trained', $stats->fighters_trained) }}">
      </div>

      <div class="col-md-4 mb-3">
        <label class="form-label">Pro Fights Won</label>
        <input type="number" class="form-control" name="pro_fights_won" value="{{ old('pro_fights_won', $stats->pro_fights_won) }}">
      </div>

      <div class="col-md-4 mb-3">
        <label class="form-label">Years of Camps</label>
        <input type="number" class="form-control" name="years_of_camps" value="{{ old('years_of_camps', $stats->years_of_camps) }}">
      </div>
    </div>

    <button class="btn btn-primary">Save</button>
  </form>
</div>
@endsection
