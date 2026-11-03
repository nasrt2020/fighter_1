@extends('admin.layouts.app')

@section('content')
<div class="page-header">
    <h3 class="page-title">Add Hero Slide</h3>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.hero-slides.store') }}"
              method="POST"
              enctype="multipart/form-data">
            @include('admin.hero-slides._form')
        </form>
    </div>
</div>
@endsection
