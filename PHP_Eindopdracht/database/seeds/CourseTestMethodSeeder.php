<?php

use App\ExamMethod;
use Illuminate\Database\Seeder;

class CourseTestMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exam_individual_assessment = new ExamMethod();
        $exam_individual_assessment->title = 'Individueel Assessment';
        $exam_individual_assessment->save();

        $exam_group_assessment = new ExamMethod();
        $exam_group_assessment->title = 'Groeps Assessment';
        $exam_group_assessment->save();

        $exam_assignments = new ExamMethod();
        $exam_assignments->title = 'Opdrachten';
        $exam_assignments->save();

        $exam_exam = new ExamMethod();
        $exam_exam->title = 'Tentamen';
        $exam_exam->save();
    }
}
