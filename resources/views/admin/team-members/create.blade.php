@extends('admin.layouts.app')

@section('content')
<h3>Add Team Member</h3>

<form action="{{ route('admin.team-members.store') }}" method="POST" enctype="multipart/form-data">
    @include('admin.team-members._form')
</form>
@endsection
