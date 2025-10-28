@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold">Sections</h2>
    <a href="{{ route('sections.create') }}" class="btn btn-primary">+ Add Section</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Section Name</th>
                    <th>Room</th>
                    <th>Subjects</th>
                    <th width="150">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sections as $s)
                <tr>
                    <td>{{ $s->id }}</td>
                    <td>{{ $s->sectionName }}</td>
                    <td>{{ $s->room }}</td>
                    <td>
                        @forelse($s->subjects as $subj)
                            <span class="badge bg-info">{{ $subj->code }}</span>
                        @empty
                            <span class="text-muted">No subjects</span>
                        @endforelse
                    </td>
                    <td>
                        <a href="{{ route('sections.edit', $s->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('sections.destroy', $s->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this section?')" class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
