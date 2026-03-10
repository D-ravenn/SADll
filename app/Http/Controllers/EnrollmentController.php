<?php

namespace App\Http\Controllers;

class EnrollmentController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        return view('enrollments.index');
    }
}
