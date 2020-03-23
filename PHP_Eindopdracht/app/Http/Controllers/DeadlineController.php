<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeadlineController extends Controller
{
    public function index()
    {
        return View('Deadline-Manager/index');
    }
}
