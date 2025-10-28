@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h2 class="fw-bold mb-3">Add Subject</h2>

        <form action="{{ route('subjects.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Subject Code</label>
                <input type="text" name="code" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Subject Name</label>
                <input type="text" name="subjectName" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Units</label>
                <input type="number" name="units" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
