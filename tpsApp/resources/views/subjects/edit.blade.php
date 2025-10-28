@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h2 class="fw-bold mb-3">Edit Subject</h2>

        <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Subject Code</label>
                <input type="text" name="code" value="{{ $subject->code }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Subject Name</label>
                <input type="text" name="subjectName" value="{{ $subject->subjectName }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Units</label>
                <input type="number" name="units" value="{{ $subject->units }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
