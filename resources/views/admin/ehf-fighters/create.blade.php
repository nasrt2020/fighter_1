@extends('admin.layouts.app') {{-- use your admin master layout --}}
@section('content')
<div class="card">
  <div class="card-body">
    <h4 class="card-title mb-4">Add EHF Fighter</h4>

    <form method="POST" action="{{ route('admin.ehf-fighters.store') }}" enctype="multipart/form-data" >
      @include('admin.ehf-fighters._form')
    </form>
  </div>
</div>
@endsection
