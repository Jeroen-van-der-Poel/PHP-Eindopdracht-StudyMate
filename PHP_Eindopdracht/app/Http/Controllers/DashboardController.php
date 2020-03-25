<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $periodes = [4];
        $totalstudypoints = 0;
        $courses = Course::all();
            foreach($courses as $course){
                $totalstudypoints += $course->study_points;
            }
        return View('Dashboard/index', compact('periodes', 'totalstudypoints'));
    }
}
