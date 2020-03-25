<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Controllers\Controller;
use App\Upload;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function index()
    {
        return view('/course/upload');
    }

    public function store(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $request->validate([
            'file' => 'mimes:pdf,xlx,csv,zip|max:2048',
        ]);
        if ($request->file != null) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $request->file->move(public_path('uploads'), $fileName);
            $course->file = $fileName;
            $course->save();
        }

        return back();
    }
}
