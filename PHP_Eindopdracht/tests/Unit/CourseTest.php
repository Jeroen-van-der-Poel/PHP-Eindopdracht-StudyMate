<?php

namespace Tests\Unit;

use App\Course;
use App\ExamMethod;
use App\Http\Controllers\CourseController;
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

    public function test_checkCoursePeriod_Correct()
    {
        //Arrange
        $controller = new CourseController();
        $value = 1;

        //Act

        //Assert
        $this->assertEquals(1, $controller->checkCoursePeriod($value));
    }

    public function test_checkCoursePeriod_notCorrect()
    {
        //Arrange
        $controller = new CourseController();
        $value = 1;

        //Act

        //Assert
        $this->assertNotEquals(2, $controller->checkCoursePeriod($value));
    }
}


