@extends('layouts.layout')

@section('content')
    <div class="container pt-1 pb-5">
        <form action="/editCourse/{{ $course->id }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PATCH')

            <div class="">
                <div class="col-6 offset-3">

                    <div class="form-group row">
                        <h2 class="pl-0 pt-5">Wijzig gegevens</h2>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label pl-0">Naam</label>

                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $course->name }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="period" class="col-md-4 col-form-label pl-0">Blok</label>

                        <input id="period" type="number" class="form-control @error('period') is-invalid @enderror" name="period" value="{{ old('period') ?? $course->period }}" required autocomplete="period" autofocus>

                        @error('period')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="coordinator" class="col-md-4 col-form-label pl-0">Coördinator</label>
                        <select name="coordinator" class="form-control">
                            @foreach($teachers as  $teacher)
                                <option value="{{$teacher->id}}" {{$teacher->id == $course->coordinator  ? 'selected' : ''}}>{{$teacher->name}}</option>
                            @endforeach
                        </select>
                        @error('coordinator')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="test_method" class="col-md-4 col-form-label pl-0">Soort Examen</label>
                        <select name="test_method" class="form-control">
                            @foreach($exam_methods as $exam_method)
                                <option value="{{ $exam_method->id }}" {{$exam_method->id == $course->exam_method_id  ? 'selected' : ''}}>{{ $exam_method->title }}</option>
                            @endforeach
                        </select>
                        @error('test_method')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="study_points" class="col-md-4 col-form-label pl-0">Studiepunten</label>

                        <input id="study_points" type="number" class="form-control @error('study_points') is-invalid @enderror" name="study_points" value="{{ old('study_points') ?? $course->study_points }}" required autocomplete="study_points" autofocus>

                        @error('study_points')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="teachers_course" class="col-md-4 col-form-label pl-0">Docenten</label>
                        <select name="teachers_course[]" class="form-control" multiple>
                            @foreach($teachers as $teacher)
                                @if(array_key_exists($teacher->id, $teachers2))
                                    <option value="{{ $teacher->id }}" selected>{{ $teacher->name }}</option>
                                @else
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endif
                            @endforeach
                        </select>

                        @error('teachers_course')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-group row pt-4 pb-5">
                        <button class="btn btn-primary">Opslaan</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
