<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Section;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $sections = Section::all(); // ✅ for dropdown filter
        $query = Student::with('section');

        // ✅ filter by section if selected
        if ($request->has('section_id') && $request->section_id != '') {
            $query->where('section_id', $request->section_id);
        }

        $students = $query->get();

        return view('students.index', compact('students', 'sections'));
    }

    public function create()
    {
        $sections = Section::all();
        return view('students.create', compact('sections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'studentNumber' => 'required|string|max:9|unique:students,studentNumber',
            'lname' => 'required|string|max:150',
            'fname' => 'required|string|max:150',
            'mi' => 'nullable|string|max:2',
            'email' => 'nullable|email|max:150',
            'contactNumber' => 'nullable|string|max:20',
            'section_id' => 'required|exists:sections,id',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student created.');
    }

    public function show(Student $student)
    {
        $student->load('section');
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $sections = Section::all();
        return view('students.edit', compact('student', 'sections'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'studentNumber' => 'required|string|max:9|unique:students,studentNumber,' . $student->id,
            'lname' => 'required|string|max:150',
            'fname' => 'required|string|max:150',
            'mi' => 'nullable|string|max:2',
            'email' => 'nullable|email|max:150',
            'contactNumber' => 'nullable|string|max:20',
            'section_id' => 'required|exists:sections,id',
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Student updated.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted.');
    }
}
