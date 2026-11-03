@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Fighter</h4>

                <form action="{{ route('admin.fighters.update', $fighter) }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @method('PUT')
                    @include('admin.fighters._form', ['fighter' => $fighter])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
