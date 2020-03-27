<?php

namespace Tests\Unit;

use App\Course;
use App\Teacher;
use App\User;
use PHPUnit\Framework\TestCase;

class TeacherTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
/*    private $user;


    public function setUp()
    {
        parent::setUp();

        $this->user = User::first();

    }*/

    public function testExample()
    {
        $this->assertTrue(true);
    }

/*    public function testWhen_TeacherGiven_Expect_TeacherWithEmail()
    {
        $teacher = new Teacher();

        $teacher->setEmailAttribute('jasper@example.com');


        $this->assertEquals('jasper@example.com', $teacher->getEmailAttribute('jasper@example.com'));
    }*/

    public function testWhen_CourseGiven_Expect_Course()
    {
        $teacher = new Teacher();
        $teacher->id = 1;
        $teacher->name = 'Jasper';

        $course = new Course();
        $course->id = 1;
        $course->name = 'webphp';
        $course->period = 1;
        $course->year = 1;
        $course->coordinator = $teacher->id;
        $course->teacher = $teacher->id;
        $course->exam_method_id = 1;
        $course->study->points = 2;

        $this->assertEquals('2', $course->getTotalBlockPoints($course->year, $course->period));
    }

    public function testWhen_UserGiven_ExpectUserAdmin()
    {
/*        $user = User::orderBy('id', 'desc')->firstOrFail()->get();*/

        $this->assertEquals('Admin', $this->user->roles->name);
    }
}
