<?php

namespace App\Http\Controllers;

use App\Course;
use App\Deadline;
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
            $deadlines = Deadline::orderBy(request('sort'), 'asc')->wherenull('finished')->get();
            $finisheddeadlines = Deadline::orderBy(request('sort'), 'asc')->where('finished', '!=', 'null')->get();
        }else{
            $deadlines = Deadline::orderBy('duedate', 'asc')->wherenull('finished')->get();
            $finisheddeadlines = Deadline::orderBy('finished', 'asc')->where('finished', '!=', 'null')->get();
        }

        $teachers = Teacher::orderBy('id', 'desc')->get();
        $courses = Course::orderBy('id', 'desc')->get();

        return View('Deadline-Manager/index', compact('deadlines', 'teachers', 'courses', 'finisheddeadlines'));
    }

    public function create()
    {
        $teachers = Teacher::orderBy('id', 'asc')->get();
        $courses = Course::orderBy('id', 'asc')->get();
        $tags = Tag::orderBy('id', 'asc')->get();
        return view('Deadline-Manager/create', compact('teachers', 'courses', 'tags'));
    }

    public function store()
    {
        $this->validateDeadline();

        $deadline = new Deadline(request(['title', 'teacherid', 'courseid', 'duedate', 'categorie']));
        $deadline->save();

        $deadline->tags()->attach(request('tags'));

        return redirect('/deadline');
    }

    protected function validateDeadline()
    {
        return request()->validate([
            'title' => 'required',
            'teacherid' => 'required',
            'courseid' => 'required',
            'duedate' => 'required',
            'categorie' => 'required',
            'tags' => 'exists:tags,id',
        ]);
    }

    public function update()
    {
        $deadlines = Deadline::orderBy('id', 'asc')->get();
        $datetime = Carbon::now();

        foreach (request('finished') as $fin){
            foreach ($deadlines as $deadline){
                if($fin == $deadline->id){
                    $deadline->finished = $datetime;
                    $deadline->save();
                }
            }
        }

        return redirect('/deadline');
    }
}

