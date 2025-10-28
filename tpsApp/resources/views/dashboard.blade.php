@extends('layouts.app')

@section('content')
<h2 class="fw-bold mb-4">Dashboard</h2>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="card text-white bg-primary mb-3 shadow">
            <div class="card-body">
                <h5 class="card-title">Total Students</h5>
                <p class="display-6">{{ $studentsCount }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card text-white bg-success mb-3 shadow">
            <div class="card-body">
                <h5 class="card-title">Total Sections</h5>
                <p class="display-6">{{ $sectionsCount }}</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
 
    <div class="col-md-6">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Recently Added Students</h5>
            </div>
            <div class="card-body">
                @if($recentStudents->isEmpty())
                    <p class="text-muted">No students found.</p>
                @else
                <ul class="list-group">
                    @foreach($recentStudents as $st)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $st->lname }}, {{ $st->fname }} {{ $st->mi }}
                            <span class="badge bg-info">{{ $st->section->sectionName ?? 'N/A' }}</span>
                        </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>

   
    <div class="col-md-6">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Recently Added Sections</h5>
            </div>
            <div class="card-body">
                @if($recentSections->isEmpty())
                    <p class="text-muted">No sections found.</p>
                @else
                <ul class="list-group">
                    @foreach($recentSections as $sec)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $sec->sectionName }}
                            <span class="badge bg-secondary">{{ $sec->room }}</span>
                        </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
