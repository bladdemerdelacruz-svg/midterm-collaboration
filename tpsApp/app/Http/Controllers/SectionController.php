<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Subject; // 
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::with('subjects')->get(); 
        return view('sections.index', compact('sections'));
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('sections.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sectionName' => 'required|string|max:100',
            'room' => 'nullable|string|max:50',
            'subjects' => 'array', 
        ]);

        $section = Section::create($request->only(['sectionName', 'room']));


        if ($request->has('subjects')) {
            $section->subjects()->sync($request->subjects);
        }

        return redirect()->route('sections.index')->with('success', 'Section created.');
    }

    public function show(Section $section)
    {
        $section->load('subjects'); 
        return view('sections.show', compact('section'));
    }

    public function edit(Section $section)
    {
        $subjects = Subject::all(); 
        $section->load('subjects'); 
        return view('sections.edit', compact('section', 'subjects'));
    }

    public function update(Request $request, Section $section)
    {
        $request->validate([
            'sectionName' => 'required|string|max:100',
            'room' => 'nullable|string|max:50',
            'subjects' => 'array', 
        ]);

        $section->update($request->only(['sectionName', 'room']));

        $section->subjects()->sync($request->subjects ?? []);

        return redirect()->route('sections.index')->with('success', 'Section updated.');
    }

    public function destroy(Section $section)
    {
        $section->subjects()->detach();
        $section->delete();

        return redirect()->route('sections.index')->with('success', 'Section deleted.');
    }
}
