@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Edit Camp Session</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.camps.index') }}">Camps</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $camp->day }} - {{ ucfirst($camp->session) }}</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Update Training Session</h4>

            <form action="{{ route('admin.camps.update', $camp) }}" method="POST">
                @method('PUT')
                @include('admin.camps._form', ['camp' => $camp])
            </form>
        </div>
    </div>
</div>
@endsection
