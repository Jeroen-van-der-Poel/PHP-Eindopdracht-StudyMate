<?php

namespace Tests\Unit;

use App\Course;
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

    public function testWhen_pointsgiven_recievedpoints()
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
}


