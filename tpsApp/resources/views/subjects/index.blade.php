@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold">Subjects</h2>
    <a href="{{ route('subjects.create') }}" class="btn btn-primary">+ Add Subject</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Code</th>
                    <th>Subject Name</th>
                    <th>Units</th>
                    <th width="150">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $subj)
                <tr>
                    <td>{{ $subj->code }}</td>
                    <td>{{ $subj->subjectName }}</td>
                    <td>{{ $subj->units }}</td>
                    <td>
                        <a href="{{ route('subjects.edit', $subj->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('subjects.destroy', $subj->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this subject?')" class="btn btn-sm btn-danger">
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
