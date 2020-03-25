<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Controllers\Controller;
use App\Upload;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index()
    {
        return view('/course/upload');
    }

    public function store(Request $request, $id)
    {
        Upload::create([
            'file' => $request->file('file')->store('file', 'public'),
            'course_id' => $id,
        ]);

        if ($request->wantsJson()) {
            return response([], 204);
        }

        return back();
    }
}
