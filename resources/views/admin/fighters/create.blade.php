@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Fighter</h4>

                <form action="{{ route('admin.fighters.store') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @include('admin.fighters._form', ['fighter' => null])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
