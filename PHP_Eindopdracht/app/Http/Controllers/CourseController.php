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

    public function edit($id){
        $course = Course::findOrFail($id);
        return view('Teacher/Edit', compact('course'));
    }

    public function update($id){

        $data = request()->validate([
            'name' => 'required',
            'period' => 'required',
            'coordinator' => 'required',
            'test_method' => 'required',
        ]);

        $course = Course::where('id', $id)->firstOrFail();
        $course->fill($data)->save();

        return redirect('/admin');
    }

    public function destroy($id){
        $teacher = Course::findOrFail($id);
        $teacher->delete();

        return redirect("/admin");
    }
}
