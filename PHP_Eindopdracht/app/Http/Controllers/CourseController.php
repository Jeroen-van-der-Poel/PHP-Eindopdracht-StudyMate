<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Controllers\Controller;
use App\Teacher;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function create(){
        $teachers = Teacher::orderBy('id', 'desc')->get();
        return view('Course/create', compact('teachers'));
    }

    public function store(Request $request){
        $selectedTeacher = $request->input('coordinator');
        Course::create([
            'name' => $request->name,
            'period' => $request->period,
            'coordinator' => Teacher::where('name', $selectedTeacher)->firstOrFail()->id,
            'test_method' => $request->input('test_method'),
            'study_points' => $request->study_points,
        ]);

        return redirect('/admin');
    }

    public function edit($id){
        $course = Course::findOrFail($id);
        $teachers = Teacher::orderBy('id', 'desc')->get();
        return view('Course/edit', compact('course', 'teachers'));
    }

    public function update(Request $request, $id){
        $selectedTeacher = $request->input('coordinator');
/*        Course::update([
            'name' => $request->name,
            'period' => $request->period,
            'coordinator' => Teacher::where('name', $selectedTeacher)->firstOrFail()->id,
            'test_method' => $request->input('test_method'),
            'study_points' => $request->study_points,
        ])->save();*/

/*        $selectedCoordinator = Teacher::where('name', $selectedTeacher)->firstOrFail()->id;
        $course = Course::where('id', $id)->firstOrFail();*/
        Course::where('id', $id)->firstOrFail()->update([
            'name' => $request->name,
            'period' => $request->period,
            'coordinator' => Teacher::where('name', $selectedTeacher)->firstOrFail()->id,
            'test_method' => $request->input('test_method'),
            'study_points' => $request->study_points,
        ]);
/*        $course->coordinator = $selectedCoordinator;

        $course->update($request->all());*/

        return redirect('/admin');
    }

    public function destroy($id){
        $teacher = Course::findOrFail($id);
        $teacher->delete();

        return redirect("/admin");
    }
}
