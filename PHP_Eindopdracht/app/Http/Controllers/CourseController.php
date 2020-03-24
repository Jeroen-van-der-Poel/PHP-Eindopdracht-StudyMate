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

    public function assignTeachersToCourse(Request $request, $id){
        $course = Course::find($id);
/*        $teachers = $request->teacher_gives_course;*/
        $request->merge([
            'teacher_gives_course' => implode(',', (array) $request->get('teacher_gives_course'))
        ]);
        foreach ($teachers as $teacher){
            $selectedteacher = Teacher::where('name', $teacher)->firstOrFail()->id;
            $course->roles()->attach($selectedteacher);
        }
    }
}
