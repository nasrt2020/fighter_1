@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Add Camp Session</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.camps.index') }}">Camps</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">New Training Session</h4>

            <form action="{{ route('admin.camps.store') }}" method="POST">
                
                @include('admin.camps._form')
            </form>
        </div>
    </div>
</div>
@endsection
