<?php

namespace Tests\Unit;

use App\Course;
use App\Http\Controllers\DashboardController;
use App\Teacher;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class TeacherTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_Teacher_name_isCorrect()
    {
        //Arrange
        $teacher = new Teacher();
        $name = "Bas";

        //Act
        $teacher->name = $name;

        //Assert
        $this->assertEquals($name, $teacher->name);
    }

    public function test_Teacher_name_isNotCorrect()
    {
        //Arrange
        $teacher = new Teacher();
        $name = "Bas";

        //Act
        $teacher->name = "Frans";

        //Assert
        $this->assertNotEquals($name, $teacher->name);
    }

    public function test_HasTaught_ReceiveCorrect()
    {
        //Arrange
        $teacher = new Teacher();
        $name = "Bas";

        //Act
        $teacher->name = $name;

        //Assert
        $this->assertEquals("Nee", $teacher->HasTaught());
    }

    public function test_HasTaught_ReceiveCorrect_withInput()
    {
        //Arrange
        $teacher = new Teacher();
        $name = "Bas";

        //Act
        $teacher->name = $name;
        $teacher->has_taught = 1;

        //Assert
        $this->assertEquals("Ja", $teacher->HasTaught());
    }

    public function test_HasTaught_Receive_NotCorrect()
    {
        //Arrange
        $teacher = new Teacher();
        $name = "Bas";

        //Act
        $teacher->name = $name;

        //Assert
        $this->assertNotEquals("Ja", $teacher->HasTaught());
    }

}
