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

    public function getTotalBlockPoints($year, $block)
    {
        $courses = Course::all();
        $count = 0;
        foreach ($courses as $course){
            if($course->year == $year){
                if($course->period == $block){
                    $count += $course->points_received;
                }
            }
        }
        return $count;
    }

    public function getTotalReceivableBlockPoints($year, $block)
    {
        $courses = Course::all();
        $count = 0;
        foreach ($courses as $course){
            if($course->year == $year){
                if($course->period == $block){
                    $count += $course->study_points;
                }
            }
        }
        return $count;
    }
}
