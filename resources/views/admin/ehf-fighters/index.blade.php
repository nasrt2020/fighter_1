@extends('admin.layouts.app')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
  <h4 class="mb-0">EHF Fighters</h4>
  <a href="{{ route('admin.ehf-fighters.create') }}" class="btn btn-primary">+ Add Fighter</a>
</div>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table align-middle">
        <thead>
          <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>Class</th>
            <th>Record</th>
            <th>Active</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($fighters as $f)
            <tr>
              <td>
                @if($f->photo_path)
                  <img src="{{ asset('storage/'.$f->photo_path) }}" style="width:46px;height:46px;border-radius:10px;object-fit:cover;">
                @else
                  <div style="width:46px;height:46px;border-radius:10px;background:#222;"></div>
                @endif
              </td>
              <td>
                <div class="fw-bold">{{ $f->name }}</div>
                <div class="text-muted small">{{ $f->nickname }}</div>
              </td>
              <td>{{ $f->weight_class }}</td>
              <td>{{ $f->wins }}-{{ $f->losses }}-{{ $f->draws }}</td>
              <td>
                <span class="badge {{ $f->is_active ? 'bg-success' : 'bg-secondary' }}">
                  {{ $f->is_active ? 'Yes' : 'No' }}
                </span>
              </td>
              <td class="text-end">
                <a href="{{ route('admin.ehf-fighters.edit', $f->id) }}" class="btn btn-sm btn-warning">Edit</a>

                <form action="{{ route('admin.ehf-fighters.destroy', $f->id) }}"
                      method="POST" class="d-inline"
                      onsubmit="return confirm('Delete this fighter?')">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-danger">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="6" class="text-center text-muted py-4">No fighters yet.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-3">
      {{ $fighters->links() }}
    </div>
  </div>
</div>

@endsection
