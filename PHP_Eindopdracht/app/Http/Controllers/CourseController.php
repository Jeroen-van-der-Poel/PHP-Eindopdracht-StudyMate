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
        $selectedTeacher = $request->input('coordinator');

        Course::where('id', $id)->firstOrFail()->update([
            'name' => $request->name,
            'period' => $request->period,
            'coordinator' => Teacher::where('name', $selectedTeacher)->firstOrFail()->id,
            'test_method' => $request->input('test_method'),
            'study_points' => $request->study_points,
        ]);
        return redirect('/admin');
    }

    public function destroy($id){
        $teacher = Course::findOrFail($id);
        $teacher->delete();

        return redirect("/admin");
    }

/*    public function assignTeachersToCourse($id){

        $course = Course::find($id);
        $selectedteachers = request('teachers_course');
        foreach ($selectedteachers as $selectedteacher)
        {
            if(!DB::table('course_teacher')
                ->where('course_id', '=', $course)
                ->where('teacher_id', '=', $selectedteacher)
                ->exists()){
                $course->teachers()->attach(request($selectedteacher));
            }
            return redirect('/admin');
        }
        $course->teachers()->attach(request('teachers_course'));

        return redirect('/admin');
    }*/
}
