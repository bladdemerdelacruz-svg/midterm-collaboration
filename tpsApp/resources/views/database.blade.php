@extends('layouts.app')

@section('content')

<div class="card shadow-sm">
    <div class="card-body">
        <h4 class="fw-bold mb-3">Latest Students</h4>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Student #</th>
                    <th>Name</th>
                    <th>Section</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @forelse($latestStudents as $student)
                <tr>
                    <td>{{ $student->studentNumber }}</td>
                    <td>{{ $student->lname }}, {{ $student->fname }}</td>
                    <td>{{ $student->section ? $student->section->sectionName : 'N/A' }}</td>
                    <td>{{ $student->email }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">No students yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('students.index') }}" class="btn btn-outline-primary">View All Students</a>
    </div>
</div>
@endsection
