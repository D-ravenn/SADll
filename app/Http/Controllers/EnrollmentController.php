<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnrollmentRequest;
use App\Http\Requests\UpdateEnrollmentRequest;
use App\Models\Enrollment;
use App\Models\Subject;
use App\Models\User;

class EnrollmentController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        $enrollments = Enrollment::query()
            ->with(['user', 'subject', 'enrolledBy'])
            ->oldest()
            ->get();

        return view('enrollments.index', compact('enrollments'));
    }

    public function create(): \Illuminate\View\View
    {
        $users = User::query()->orderBy('name')->get();
        $subjects = Subject::query()->where('is_active', true)->orderBy('name')->get();

        return view('enrollments.create', compact('users', 'subjects'));
    }

    public function store(StoreEnrollmentRequest $request): \Illuminate\Http\RedirectResponse
    {
        Enrollment::query()->create($request->validated());

        return redirect()->route('enrollments.index')
            ->with('success', 'Enrollment created successfully.');
    }

    public function edit(Enrollment $enrollment): \Illuminate\View\View
    {
        $users = User::query()->orderBy('name')->get();
        $subjects = Subject::query()->where('is_active', true)->orderBy('name')->get();

        return view('enrollments.edit', compact('enrollment', 'users', 'subjects'));
    }

    public function update(UpdateEnrollmentRequest $request, Enrollment $enrollment): \Illuminate\Http\RedirectResponse
    {
        $enrollment->update($request->validated());

        return redirect()->route('enrollments.index')
            ->with('success', 'Enrollment updated successfully.');
    }

    public function destroy(Enrollment $enrollment): \Illuminate\Http\RedirectResponse
    {
        $enrollment->delete();

        return redirect()->route('enrollments.index')
            ->with('success', 'Enrollment deleted successfully.');
    }
}
