<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deadline extends Model
{
    protected $guarded = [];

    public function Exam($id){
        if($id != ""){
            return ExamMethod::where('id', $id)->firstOrFail()->title;
        }
        else {
            return "";
        }
    }

    public function GetTeacher($id){
        if($id != ""){
            return Teacher::where('id', $id)->firstOrFail()->name;
        }
        else {
            return "";
        }
    }

    public function GetCourse($id){
        if($id != ""){
            return Course::where('id', $id)->firstOrFail()->name;
        }
        else {
            return "";
        }
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function exammethods()
    {
        return $this->belongsTo(ExamMethod::class);
    }

}
