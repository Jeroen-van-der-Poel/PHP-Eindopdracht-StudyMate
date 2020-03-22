<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Controllers\Controller;
use App\Teacher;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $teachers = Teacher::orderBy('id', 'desc')->get();
        $courses = Course::orderBy('id', 'desc')->get();
        return view('Admin-Area/index' , compact('teachers','courses' ));
    }
}
