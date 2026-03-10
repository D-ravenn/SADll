<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        $subjects = Subject::query()->orderBy('name')->get();

        return view('Subject.index', compact('subjects'));
    }

    public function create(): \Illuminate\View\View
    {
        return view('Subject.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'curiculum'   => 'required|string|max:255',
            'name'        => 'required|string|max:255',
            'code'        => 'required|string|max:50|unique:subjects,code',
            'description' => 'nullable|string|max:1000',
            'is_active'   => 'boolean',
        ]);

        Subject::create([
            'curiculum'   => $request->curiculum,
            'name'        => $request->name,
            'code'        => strtoupper($request->code),
            'description' => $request->description,
            'is_active'   => $request->has('is_active') ? 1 : 1, // default active
        ]);

        return redirect()->route('subjects.index')->with('success', 'Subject added successfully!');
    }

    public function edit(Subject $subject): \Illuminate\View\View
    {
        return view('Subject.edit', compact('subject'));
    }

    public function update(Request $request, Subject $subject): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'curiculum'   => 'required|string|max:255',
            'name'        => 'required|string|max:255',
            'code'        => 'required|string|max:50|unique:subjects,code,' . $subject->id,
            'description' => 'nullable|string|max:1000',
            'is_active'   => 'nullable|boolean',
        ]);

        $subject->update([
            'curiculum'   => $request->curiculum,
            'name'        => $request->name,
            'code'        => strtoupper($request->code),
            'description' => $request->description,
            'is_active'   => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully!');
    }

    public function destroy(Subject $subject): \Illuminate\Http\RedirectResponse
    {
        $subject->delete();

        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully!');
    }
}
