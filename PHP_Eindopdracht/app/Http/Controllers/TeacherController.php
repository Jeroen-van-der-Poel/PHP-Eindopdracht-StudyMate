<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    public function create(){
        return view('Teacher/create');
    }

    public function store(){
        $data = request()->validate([
            'name' => 'required',
            'email' => 'email:rfc,dns',
            'phone_number' => 'required',
        ]);

        \App\Teacher::create($data);

        return redirect('/admin');
    }
}
