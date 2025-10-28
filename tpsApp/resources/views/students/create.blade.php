@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h2 class="fw-bold mb-3">Add Student</h2>

        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Student Number</label>
                    <input type="text" name="studentNumber" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Section</label>
                    <select name="section_id" class="form-select" required>
                        <option value="">-- Select Section --</option>
                        @foreach($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->sectionName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="lname" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">First Name</label>
                    <input type="text" name="fname" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Middle Initial</label>
                    <input type="text" name="mi" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Contact Number</label>
                    <input type="text" name="contactNumber" class="form-control">
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
