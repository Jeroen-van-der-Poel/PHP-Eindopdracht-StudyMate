<?php

namespace App\Http\Controllers;

use App\Course;
use App\Deadline;
use App\ExamMethod;
use App\Tag;
use App\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeadlineController extends Controller
{
    public function index()
    {
        $datetime = Carbon::now();

        if(request('sort')){
            $deadlines = Deadline::orderBy(request('sort'), 'asc')->wherenull('finished')->where('duedate', '>=', $datetime)->get();
            $finisheddeadlines = Deadline::orderBy(request('sort'), 'asc')->whereNotNull('finished')->get();
        }else{
            $deadlines = Deadline::orderBy('duedate', 'asc')->wherenull('finished')->where('duedate', '>=', $datetime)->get();
            $finisheddeadlines = Deadline::orderBy('finished', 'asc')->whereNotNull('finished')->get();
        }

        $teachers = Teacher::orderBy('id', 'desc')->get();
        $courses = Course::orderBy('id', 'desc')->get();
        $exam_methods = ExamMethod::all();

        return View('Deadline-Manager/index', compact('deadlines', 'teachers', 'courses', 'finisheddeadlines', 'exam_methods'));
    }

    public function create()
    {
        $teachers = Teacher::orderBy('id', 'asc')->get();
        $courses = Course::orderBy('id', 'asc')->get();
        $exam_methods = ExamMethod::all();
        $tags = Tag::orderBy('id', 'asc')->get();
        return view('Deadline-Manager/create', compact('teachers', 'courses', 'tags', 'exam_methods'));
    }

    public function store()
    {
        $this->validateDeadline();

        $deadline = new Deadline(request(['title', 'teacher_id', 'course_id', 'duedate', 'exam_method_id']));
        $deadline->exam_method_id = $this->getCourseExam($deadline->course_id);
        $deadline->save();
        $deadline->tags()->attach(request('tags'));

        return redirect('/deadline');
    }

    protected function validateDeadline()
    {
        return request()->validate([
            'title' => 'required',
            'teacher_id' => 'required',
            'course_id' => 'required',
            'duedate' => 'required|after:1 hour',
            'tags' => 'exists:tags,id',
        ]);
    }

    public function finish()
    {
        $deadlines = Deadline::orderBy('id', 'asc')->get();
        $datetime = Carbon::now();

        if(request('finished') != null) {
            foreach (request('finished') as $fin) {
                foreach ($deadlines as $deadline) {
                    if ($fin == $deadline->id) {
                        $deadline->finished = $datetime;
                        $deadline->save();
                    }
                }
            }
        }
        return redirect('/deadline');
    }

    public function getCourseExam($id)
    {
        $course = Course::findOrFail($id);
        $exam = $course->exam_method_id;
        return $exam;
    }

}

