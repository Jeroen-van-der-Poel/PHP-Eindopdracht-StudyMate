<?php

use App\Course;
use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course1 = new Course();
        $course1->name = "JavaScript";
        $course1->year = 2;
        $course1->period = 7;
        $course1->coordinator = 1;
        $course1->teacher = 1;
        $course1->exam_method_id = 1;
        $course1->study_points = 2;
        $course1->save();

        $course2 = new Course();
        $course2->name = "PHP";
        $course2->year = 2;
        $course2->period = 7;
        $course2->coordinator = 2;
        $course2->teacher = 2;
        $course2->exam_method_id = 1;
        $course2->study_points = 2;
        $course2->save();
    }
}
