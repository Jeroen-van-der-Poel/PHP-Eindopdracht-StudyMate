@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row pb-4  pt-4">
            <div class="col-lg-12 col-lg-offset-1">
                <div class="table-responsive">
                    <div class="card-header d-flex justify-content-between">
                        <span><i class="fas fa-users"></i>Docenten overzicht</span>
                        <span><a href="/addTeacher">Docent Toevoegen</a></span>
                    </div>
                    <table class="table table-bordered table-striped">

                        <thead>
                        <tr>
                            <th>Naam</th>
                            <th>Email</th>
                            <th>Heeft jouw les gegeven</th>
                            <th>Operaties</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($teachers as $key => $teacher)

                            <tr>


                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td>{{ $teacher->HasTaught() }}</td>

                                <td>
                                    <form action="/editTeacher/{{$teacher->id}}" method="GET">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success d-flex float-right" value="Wijzigen">
                                        </div>
                                    </form>

                                    <form class="float-right d-flex pr-2" method="POST" action="/teacher/{{$teacher->id}}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <div class="form-group d-flex">
                                            <input type="submit" class="btn btn-danger delete-user" value="verwijderen">
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12 col-lg-offset-1">
                <div class="table-responsive">
                        <div class="card-header d-flex justify-content-between">
                            <span><i class="fas fa-users"></i>Course overzicht</span>
                            <span><a href="/addCourse">Course Toevoegen</a></span>
                    </div>
                    <table class="table table-bordered table-striped">

                        <thead>
                        <tr>
                            <th>Naam</th>
                            <th>Periode</th>
                            <th>Coördinator</th>
                            <th>Soort examen</th>
                            <th>Studiepunten</th>
                            <th>Cijfer</th>
                            <th>Docenten</th>
                            <th>Operaties</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($courses as $course)

                            <tr>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->period }}</td>
                                <td>{{ $course->Coordinator($course->coordinator) }}</td>
                                <td>{{ $course->Exam($course->exam_method_id)}}</td>
                                <td>{{ $course->study_points}}</td>
                                <td>{{ $course->grade}}</td>
                                <td>{{ $course->teachers()->pluck('name')->implode(' ') }}</td>
                                <td>
                                    <form action="/editCourse/{{$course->id}}" method="GET">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success d-flex float-right" value="Wijzigen">
                                        </div>
                                    </form>

                                    <form class="float-right d-flex pr-2" method="POST" action="/course/{{$course->id}}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <div class="form-group d-flex">
                                            <input type="submit" class="btn btn-danger delete-course" value="Verwijderen">
                                        </div>
                                    </form>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary d-flex float-right" data-toggle="modal" data-target="#grade{{$course->id}}">
                                        Cijfer
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="grade{{$course->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Cijfer van course</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/giveGrade/{{$course->id}}" method="post" enctype="multipart/form-data">
                                                    {{@csrf_field()}}
                                                    <div class="modal-body">
                                                        <label for="number">Cijfer</label>
                                                        <input type="number" min="1" max="10" step="0.1" class="form-control" value="{{ old('grade') ?? $course->grade }}" name="grade" id="grade" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-success" value="Opslaan">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    @if($course->Exam($course->exam_method_id) == "Assessment")
                                        @if(!$course->file)
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary d-flex float-right" data-toggle="modal" data-target="#edit{{$course->id}}">
                                                Upload
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="edit{{$course->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">File uploaden</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="/upload/{{$course->id}}" method="post" enctype="multipart/form-data">
                                                            {{@csrf_field()}}
                                                            <div class="modal-body">
                                                                <label for="file">File</label>
                                                                <input class="form-control @error('file') is-invalid @enderror" type="file" accept="zip/*" name="file" required>
                                                                @error('file')
                                                                    <span class="invalid-feedback" role="alert">
                                                                         <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
                                                                <div class="form-group">
                                                                    <input type="submit" class="btn btn-success" value="Opslaan">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                                <a href="/uploads/{{$course->file}}" download="/uploads/{{$course->file}}">
                                                    <button type="button" class="btn btn-primary d-flex float-right">
                                                        Download
                                                    </button>
                                                </a>
                                            @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
