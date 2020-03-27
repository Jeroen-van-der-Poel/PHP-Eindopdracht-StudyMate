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
        $exam_individual_assessment->title = 'Assessment';
        $exam_individual_assessment->save();

        $exam_exam = new ExamMethod();
        $exam_exam->title = 'Tentamen';
        $exam_exam->save();
    }
}
