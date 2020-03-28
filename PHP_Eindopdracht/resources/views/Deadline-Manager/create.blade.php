@extends('layouts.Layout')

@section('content')
    <div class="container pt-1 pb-5">
        <form action="/deadline" enctype="multipart/form-data" method="post">
            @csrf

            <div>
                <div class="col-6 offset-3">

                    <div class="form-group row">
                        <h2 class="pl-0 pt-5">Deadline aanmaken</h2>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label pl-0">Opdracht(naam)</label>

                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="teacher_id" class="col-md-4 col-form-label pl-0">Docent</label>
                        <select name="teacher_id" class="form-control">
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>

                        @error('teacher_id')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="course_id" class="col-md-4 col-form-label pl-0">Course</label>
                        <select name="course_id" class="form-control">
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>

                        @error('course_id')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="duedate" class="col-md-4 col-form-label pl-0">Tentamen/Inlever datum</label>

                        <input id="duedate" type="datetime-local" class="form-control @error('duedate') is-invalid @enderror" name="duedate" value="{{ old('duedate') }}" required autocomplete="duedate" autofocus>

                        @error('duedate')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="tags" class="col-md-4 col-form-label pl-0">Tags</label>
                        <select name="tags[]" class="form-control" multiple>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                        </select>

                        @error('tags')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row pt-4 pb-5">
                        <button class="btn btn-primary">Deadline Opslaan</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
