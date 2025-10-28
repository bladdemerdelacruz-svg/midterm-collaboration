@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h2 class="fw-bold mb-3">{{ isset($student) ? 'Edit Student' : 'Add Student' }}</h2>

        <form action="{{ isset($student) ? route('students.update', $student->id) : route('students.store') }}" method="POST">
            @csrf
            @if(isset($student))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label class="form-label">Student Number</label>
                <input type="text" name="studentNumber" class="form-control"
                       value="{{ $student->studentNumber ?? '' }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" name="lname" class="form-control"
                       value="{{ $student->lname ?? '' }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" name="fname" class="form-control"
                       value="{{ $student->fname ?? '' }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Middle Initial</label>
                <input type="text" name="mi" class="form-control"
                       value="{{ $student->mi ?? '' }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control"
                       value="{{ $student->email ?? '' }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Contact Number</label>
                <input type="text" name="contactNumber" class="form-control"
                       value="{{ $student->contactNumber ?? '' }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Section</label>
                <select name="section_id" class="form-select" required>
                    <option value="">-- Select Section --</option>
                    @foreach($sections as $section)
                        <option value="{{ $section->id }}"
                            {{ isset($student) && $student->section_id == $section->id ? 'selected' : '' }}>
                            {{ $section->sectionName }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">
                {{ isset($student) ? 'Update' : 'Save' }}
            </button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
