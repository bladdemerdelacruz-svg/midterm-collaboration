@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h2 class="fw-bold mb-3">Edit Section</h2>

        <form action="{{ route('sections.update', $section->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Section Name</label>
                <input type="text" name="sectionName" value="{{ $section->sectionName }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Room</label>
                <input type="text" name="room" value="{{ $section->room }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Subjects</label>
                <select name="subjects[]" class="form-select" multiple>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}"
                            {{ $section->subjects->contains($subject->id) ? 'selected' : '' }}>
                            {{ $subject->code }} - {{ $subject->subjectName }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('sections.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
