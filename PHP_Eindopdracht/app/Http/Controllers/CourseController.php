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

        $yearValue = $this->checkCoursePeriod($request->period);
        $course->year = $yearValue;
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

    public function checkCoursePeriod($value){
        if($value == "1" ||$value == "2" ||$value == "3" ||$value == "4")
        {
            return 1;
        }
        else if($value == "5" ||$value == "6" ||$value->period == "7" ||$value == "8")
        {
            return 2;
        }
        else if($value == "9" ||$value == "10" ||$value == "11" ||$value == "12")
        {
            return 3;
        }
        else if($value == "13" ||$value == "14" ||$value == "15" ||$value == "16")
        {
            return 4;
        }
    }
}
