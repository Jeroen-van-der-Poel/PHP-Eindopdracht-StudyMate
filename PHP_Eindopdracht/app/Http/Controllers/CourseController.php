<?php

namespace App\Http\Controllers;

use App\Course;
use App\ExamMethod;
use App\Http\Controllers\Controller;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function create(){
        $teachers = Teacher::orderBy('id', 'desc')->get();
        $exam_methods = ExamMethod::all();
        return view('Course/create', compact('teachers', 'exam_methods'));
    }

    public function store(Request $request){
        Course::create([
            'name' => $request->name,
            'period' => $request->period,
            'coordinator' => $request->input('coordinator'),
            'exam_method_id' => $request->input('test_method'),
            'study_points' => $request->study_points,
        ]);
        $course = Course::orderBy('id', 'desc')->firstOrFail();
        $course->teachers()->attach(request('teachers_course'));
        return redirect('/admin');
    }

    public function edit($id){
        $course = Course::findOrFail($id);
        $teachers = Teacher::orderBy('id', 'desc')->get();
        $exam_methods = ExamMethod::all();
        return view('Course/edit', compact('course', 'teachers', 'exam_methods'));
    }

    public function update(Request $request, $id){

        Course::where('id', $id)->firstOrFail()->update([
            'name' => $request->name,
            'period' => $request->period,
            'coordinator' => $request->input('coordinator'),
            'exam_method_id' => $request->input('test_method'),
            'study_points' => $request->study_points,
        ]);
        return redirect('/admin');
    }

    public function destroy($id){
        $teacher = Course::findOrFail($id);
        $teacher->delete();

        return redirect("/admin");
    }

}
