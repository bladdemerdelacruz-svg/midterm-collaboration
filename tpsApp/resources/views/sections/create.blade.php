@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h2 class="fw-bold mb-3">Add Section</h2>

        <form action="{{ route('sections.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Section Name</label>
                <input type="text" name="sectionName" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Room</label>
                <input type="text" name="room" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Subjects</label>
                <select name="subjects[]" class="form-select" multiple>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->code }} - {{ $subject->subjectName }}</option>
                    @endforeach
                </select>
                <small class="text-muted">Hold CTRL (Windows) or CMD (Mac) to select multiple</small>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('sections.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
