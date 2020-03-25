<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $periodes = [1, 2, 3, 4];
        $blocks = [1, 2, 3, 4];
        $count = 0;
        $totalstudypoints = 0;
        $courses = Course::all();
            foreach($courses as $course){
                    $totalstudypoints += $course->points_received;
            }
        return View('Dashboard/index', compact('periodes', 'totalstudypoints', 'courses', 'blocks', 'count'));
    }
}
