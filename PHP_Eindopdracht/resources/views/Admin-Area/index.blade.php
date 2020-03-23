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
                            <th>Telefoonnummer</th>
                            <th>Heeft jouw les gegeven</th>
                            <th>Operaties</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($teachers as $key => $teacher)

                            <tr>


                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td>{{ $teacher->phone_number }}</td>
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
                            <span><i class="fas fa-users"></i>Vakken overzicht</span>
                            <span><a href="/addCourse">Vakken Toevoegen</a></span>
                    </div>
                    <table class="table table-bordered table-striped">

                        <thead>
                        <tr>
                            <th>Naam</th>
                            <th>Periode</th>
                            <th>Coördinator</th>
                            <th>Soort examen</th>
                            <th>Studiepunten</th>
                            <th>Operaties</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($courses as $course)

                            <tr>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->period }}</td>
                                <td>{{ \App\Teacher::where('id', $course->coordinator)->firstOrFail()->name }}</td>
                                <td>{{ $course->test_method}}</td>
                                <td>{{ $course->study_points}}</td>
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
