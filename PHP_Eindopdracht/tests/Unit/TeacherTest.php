<?php

namespace Tests\Unit;

use App\Course;
use App\Http\Controllers\DashboardController;
use App\Teacher;
use App\User;
use Tests\TestCase;

class TeacherTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function test_Teacher_name_isCorrect()
    {
        $teacher = new Teacher();
        $name = "Bas";

        $teacher->name = $name;

        $this->assertEquals($name, $teacher->name);
    }

    public function test_Teacher_name_isNotCorrect()
    {
        $teacher = new Teacher();
        $name = "Bas";

        $teacher->name = "Frans";

        $this->assertNotEquals($name, $teacher->name);
    }
}
