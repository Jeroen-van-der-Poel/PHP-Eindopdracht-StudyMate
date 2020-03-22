<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function create(){
        return view('Course/create');
    }

    public function store(){
        $data = request()->validate([
            'name' => 'required',
            'period' => 'required',
            'coordinator' => 'required',
            'test_method' => 'required',
        ]);

        Course::create($data);

        return redirect('/admin');
    }
}
