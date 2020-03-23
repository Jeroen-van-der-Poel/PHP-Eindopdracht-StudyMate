<?php

namespace App\Http\Controllers;

use App\Course;
use App\Deadline;
use App\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeadlineController extends Controller
{
    public function index()
    {
        $datetime = Carbon::now();
        $deadlines = Deadline::orderBy('duedate', 'asc')->where('duedate', '>=', $datetime)->get();
        $finisheddeadlines = Deadline::orderBy('duedate', 'asc')->where('duedate', '<', $datetime)->get();
        $teachers = Teacher::orderBy('id', 'desc')->get();
        $courses = Course::orderBy('id', 'desc')->get();
        return View('Deadline-Manager/index', compact('deadlines', 'teachers', 'courses', 'finisheddeadlines'));
    }

    public function create()
    {
        $teachers = Teacher::orderBy('id', 'desc')->get();
        $courses = Course::orderBy('id', 'desc')->get();
        return view('Deadline-Manager/create', compact('teachers', 'courses'));
    }

    public function store(){

        $data = request()->validate([
            'title' => 'required',
            'teacherid' => 'required',
            'courseid' => 'required',
            'duedate' => 'required',
            'categorie' => 'required',
        ]);

        \App\Deadline::create($data);

        return redirect('/deadline');
    }
}

