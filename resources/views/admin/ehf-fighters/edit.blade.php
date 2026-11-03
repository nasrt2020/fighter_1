@extends('admin.layouts.app')
@section('content')
<div class="card">
  <div class="card-body">
    <h4 class="card-title mb-4">Edit EHF Fighter</h4>

    <form method="POST" action="{{ route('admin.ehf-fighters.update', $fighter->id) }}" enctype="multipart/form-data">
      @method('PUT')
      @include('admin.ehf-fighters._form', ['fighter' => $fighter])
    </form>
  </div>
</div>
@endsection
