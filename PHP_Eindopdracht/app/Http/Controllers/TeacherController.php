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
            'email' => 'nullable|email:rfc,dns',
            'has_taught' => ''
        ]);

        Teacher::create($data);

        return redirect('/admin');
    }

    public function edit($id){
        $teacher = Teacher::findOrFail($id);
        return view('Teacher/Edit', compact('teacher'));
    }

    public function update($id){

        $teacher = Teacher::where('id', $id)->firstOrFail();

        $teacher->has_taught = 0;
        $teacher->save();

        $data = request()->validate([
            'name' => 'required',
            'email' => 'nullable|email:rfc,dns',
            'has_taught' => ''
        ]);

        $teacher->fill($data)->save();

        return redirect('/admin');
    }

    public function destroy($id){
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect("/admin");
    }
}
