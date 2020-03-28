<?php

namespace Tests\Unit;

use App\Course;
use App\ExamMethod;
use App\Http\Controllers\DashboardController;
use App\Teacher;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_When_pointsgiven_recievedpoints()
    {
        //Arrange
        $course = new Course();
        $year = 1;
        $block = 1;

        //Act
        $courses = Course::all();
        $count = 0;
        foreach ($courses as $course){
            if($course->year == $year){
                if($course->period == $block){
                    $count += $course->points_received;
                }
            }
        }

        //Assert
        $this->assertEquals($count, $course->getTotalBlockPoints($year, $block));
    }

    public function test_When_pointsgiven_recievedpoints_notCorrect()
    {
        //Arrange
        $course = new Course();
        $year = 1;
        $block = 1;

        //Act
        $courses = Course::all();
        $count = 0;
        foreach ($courses as $course){
            if($course->year == $year){
                if($course->period == $block){
                    $count += $course->points_received;
                }
            }
        }

        //Assert
        $this->assertNotEquals($count+1, $course->getTotalBlockPoints($year, $block));
    }

    public function test_Totalpointspossible_totalpointsgot()
    {
        //Arrange
        $course = new Course();
        $year = 1;
        $block = 1;

        //Act
        $courses = Course::all();
        $count = 0;
        foreach ($courses as $course){
            if($course->year == $year){
                if($course->period == $block){
                    $count += $course->study_points;
                }
            }
        }

        //Assert
        $this->assertEquals($count, $course->getTotalReceivableBlockPoints($year, $block));
    }

    public function test_Totalpointspossible_totalpointsgot_notCorrect()
    {
        //Arrange
        $course = new Course();
        $year = 1;
        $block = 1;

        //Act
        $courses = Course::all();
        $count = 0;
        foreach ($courses as $course){
            if($course->year == $year){
                if($course->period == $block){
                    $count += $course->study_points;
                }
            }
        }

        //Assert
        $this->assertNotEquals($count+1, $course->getTotalReceivableBlockPoints($year, $block));
    }

/*    public function test_giveId_receiveTitle()
    {
        //Arrange
        $course = new Course();
        $course->exam_method_id = 1;

        //Act

        //Assert
        $this->assertEquals("Assessment", $course->Exam($course->exam_method_id));
    }*/

/*    public function test_giveId_receiveTeacher()
    {
        //Arrange
        $name = "frans";

        $teacher = new Teacher();
        $teacher->id = 99;
        $teacher->name = $name;

        $course = new Course();
        $course->name = "webphp";
        $course->period = 1;
        $course->year = 1;
        $course->coordinator = $teacher->id;
        $course->teacher = $teacher->id;
        $course->exam_method_id = 1;
        $course->study_points = 2;

        //Act

        //Assert
        $this->assertEquals($name, $course->Coordinator($course->coordinator));
    }*/
}


