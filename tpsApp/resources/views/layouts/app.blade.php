<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TPS App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            min-height: 100vh;
            background: #343a40;
            color: #fff;
        }
        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
        }
        .sidebar a.active, .sidebar a:hover {
            background: #536475ff;
            color: #fff;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="d-flex">
   
    <div class="sidebar p-3">
        <h4 class="text-white">TPS App</h4>
        <a href="{{ route('students.index') }}" class="{{ request()->is('students*') ? 'active' : '' }}">Students</a>
        <a href="{{ route('sections.index') }}" class="{{ request()->is('sections*') ? 'active' : '' }}">Sections</a>
        <a href="{{ route('subjects.index') }}" class="{{ request()->is('subjects*') ? 'active' : '' }}">Subjects</a>

        <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Dashboard</a>
    </div>

    <div class="flex-grow-1 content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
