<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    public function Coordinator($id){
        if($id != ""){
            return Teacher::where('id', $id)->firstOrFail()->name;
        }
        else {
            return "";
        }
    }

    public function Exam($id){
        if($id != ""){
            return ExamMethod::where('id', $id)->firstOrFail()->title;
        }
        else {
            return "";
        }
    }

    public function HasUploadedFile($id)
    {
        if($id != ""){
            if(Upload::where('course_id', $id)->firstOrFail()){
                return true;
            }
            return false;
        }
        else {
            return false;
        }
    }

    public function teachers()
    {
        return $this->BelongsToMany(Teacher::class);
    }

    public function course()
    {
        return $this->hasOne(Upload::class);
    }

    public function deadlines()
    {
        return $this->hasMany(Deadline::class);

    }

    public function exam_method()
    {
        return $this->hasOne(ExamMethod::class);
    }
}
