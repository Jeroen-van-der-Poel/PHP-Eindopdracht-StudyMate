<?php

use App\Deadline;
use Illuminate\Database\Seeder;

class DeadlineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deadline1 = new Deadline();
        $deadline1->title = "php eindopdracht";
        $deadline1->teacher_id = 1;
        $deadline1->course_id = 2;
        $deadline1->duedate = "2020-05-05T10:40";
        $deadline1->exam_method_id = 1;
        $deadline1->save();

        $deadline2 = new Deadline();
        $deadline2->title = "JS eindopdracht";
        $deadline2->teacher_id = 1;
        $deadline2->course_id = 1;
        $deadline2->duedate = "2020-05-04T10:00";
        $deadline2->exam_method_id = 1;
        $deadline2->save();
    }
}
