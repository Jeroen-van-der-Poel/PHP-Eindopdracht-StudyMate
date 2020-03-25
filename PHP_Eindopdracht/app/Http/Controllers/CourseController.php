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
        if($request->period == "1" ||$request->period == "2" ||$request->period == "3" ||$request->period == "4")
        {
            $course->year = 1;
        }
        else if($request->period == "5" ||$request->period == "6" ||$request->period == "7" ||$request->period == "8")
        {
            $course->year = 2;
        }
        else if($request->period == "9" ||$request->period == "10" ||$request->period == "11" ||$request->period == "12")
        {
            $course->year = 3;
        }
        else if($request->period == "13" ||$request->period == "14" ||$request->period == "15" ||$request->period == "16")
        {
            $course->year = 4;
        }
        $course->save();
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

    public function giveGrade($id){
        $course = Course::findOrFail($id);
        $data = request()->validate([
            'grade' => 'required'
        ]);
        if(request('grade') >= 5.5)
        {
            $amountOfStudyPoints = $course->study_points;
            $course->points_received = $amountOfStudyPoints;
            $course->save();
        }
        else{
            $course->points_received = 0;
            $course->save();
        }
        $course->fill($data)->save();

        return redirect('/admin');
    }

}
