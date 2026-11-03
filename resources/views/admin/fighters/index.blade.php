@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title mb-0">Fighters</h4>
            <a href="{{ route('admin.fighters.create') }}" class="btn btn-primary btn-sm">
                + Add Fighter
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                @if($fighters->count())
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Division</th>
                                    <th>Stance</th>
                                    <th>Record</th>
                                    <th>Featured</th>
                                    <th>Actions</th>
                                     <th>State</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fighters as $fighter)
                                    <tr>
                                        <td>{{ $fighter->id }}</td>
                                        <td>
                                            @if($fighter->photo_path)
                                                <img src="{{ asset('storage/' . $fighter->photo_path) }}"
                                                     alt="{{ $fighter->name }}"
                                                     style="width:40px; height:40px; border-radius:50%; object-fit:cover;">
                                            @else
                                                <span class="text-muted">No photo</span>
                                            @endif
                                        </td>
                                        <td>{{ $fighter->name }}</td>
                                        <td>{{ $fighter->division }}</td>
                                        <td>{{ $fighter->stance }}</td>
                                        <td>{{ $fighter->wins }} - {{ $fighter->losses }} - {{ $fighter->draws }}</td>
                                        <td>
                                            @if($fighter->is_featured)
                                                <span class="badge badge-success">Yes</span>
                                            @else
                                                <span class="badge badge-secondary">No</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.fighters.edit', $fighter) }}"
                                               class="btn btn-sm btn-warning">Edit</a>

                                            <form action="{{ route('admin.fighters.destroy', $fighter) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Delete this fighter?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                            <form action="{{ route('admin.key-fighters.toggle-status', $fighter->id) }}"
      method="POST"
      style="display:inline-block">
    @csrf
    @method('PATCH')

    @if($fighter->is_active)
        <button class="btn btn-sm btn-warning">
            Deactivate
        </button>
    @else
        <button class="btn btn-sm btn-success">
            Activate
        </button>
    @endif
</form>
<td>
    @if($fighter->is_active)
        <span class="badge bg-success">Active</span>
    @else
        <span class="badge bg-danger">Inactive</span>
    @endif
</td>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $fighters->links() }}
                    </div>
                @else
                    <p class="text-muted mb-0">No fighters found. Click “Add Fighter” to create one.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
