<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

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
            'has_taught' => ''
        ]);

        \App\Teacher::create($data);

        return redirect('/admin');
    }

    public function edit($id){
        $teacher = Teacher::findOrFail($id);
        return view('Teacher/Edit', compact('teacher'));
    }

    public function update($id){

        $data = request()->validate([
            'name' => 'required',
            'email' => 'email:rfc,dns',
            'phone_number' => 'required',
            'has_taught' => ''
        ]);

        $teacher = Teacher::where('id', $id)->firstOrFail();
        $teacher->fill($data)->save();

        return redirect('/admin');
    }
}
