@extends('admin.layouts.app')

@section('content')
<h3>Edit Team Member</h3>

<form action="{{ route('admin.team-members.update', $member) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @include('admin.team-members._form')
</form>
@endsection
