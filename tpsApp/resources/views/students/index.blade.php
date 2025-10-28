@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold">Students</h2>
    <a href="{{ route('students.create') }}" class="btn btn-primary">+ Add Student</a>
</div>

<!-- 🔍 Filter by Section -->
<form method="GET" action="{{ route('students.index') }}" class="row g-2 mb-3">
    <div class="col-md-4">
        <select name="section_id" class="form-select" onchange="this.form.submit()">
            <option value="">-- All Sections --</option>
            @foreach($sections as $section)
                <option value="{{ $section->id }}" 
                    {{ request('section_id') == $section->id ? 'selected' : '' }}>
                    {{ $section->sectionName }}
                </option>
            @endforeach
        </select>
    </div>
    @if(request('section_id'))
    <div class="col-md-2">
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Reset</a>
    </div>
    @endif
</form>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Student #</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Section</th>
                    <th width="160">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $st)
                <tr>
                    <td>{{ $st->studentNumber }}</td>
                    <td>{{ $st->lname }}, {{ $st->fname }} {{ $st->mi }}</td>
                    <td>{{ $st->email }}</td>
                    <td>{{ $st->contactNumber }}</td>
                    <td><span class="badge bg-info">{{ $st->section->sectionName ?? 'N/A' }}</span></td>
                    <td>
                        <a href="{{ route('students.edit', $st->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('students.destroy', $st->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this student?')" class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No students found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
