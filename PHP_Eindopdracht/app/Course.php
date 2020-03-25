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

    public function teachers()
    {
        return $this->BelongsToMany(Teacher::class);
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
