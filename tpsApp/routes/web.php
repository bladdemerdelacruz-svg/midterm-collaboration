<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SubjectController; 
use App\Models\Student;
use App\Models\Section;

Route::get('/', function () {
    return view('dashboard', [
        'studentsCount' => Student::count(),
        'sectionsCount' => Section::count(),
        'recentStudents' => Student::latest()->take(5)->get(),
        'recentSections' => Section::latest()->take(5)->get(),
    ]);
});

Route::resource('sections', SectionController::class);
Route::resource('students', StudentController::class);
Route::resource('subjects', SubjectController::class);
