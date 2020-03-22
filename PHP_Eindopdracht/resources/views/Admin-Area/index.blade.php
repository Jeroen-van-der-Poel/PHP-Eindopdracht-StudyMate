@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-lg-offset-1">
                <div class="table-responsive">
                    <div class="card-header">
                        <i class="fas fa-chart-area"></i>
                        Docenten overzicht
                    </div>
                    <table class="table table-bordered table-striped">

                        <thead>
                        <tr>
                            <th>Naam</th>
                            <th>Email</th>
                            <th>Telefoonnummer</th>
                            <th>Heeft les gegeven</th>
                            <th>Operaties</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($teachers as $key => $teacher)

                            <tr>


                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td>{{ $teacher->phone_number }}</td>
                                <td>{{ $teacher->has_taught }}</td>

                                <td>

                                    {{--                                <form action="/EditEvenement/{{$event->id}}" method="GET">
                                                                        <div class="form-group">
                                                                            <input type="submit" class="btn btn-success d-flex float-right" value="Wijzigen">
                                                                        </div>
                                                                    </form>

                                                                    <form class="float-right" method="POST" action="/admin-area/events/{{$event->id}}">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('DELETE') }}

                                                                        <div class="form-group">
                                                                            <input type="submit" class="btn btn-danger d-flex float-right delete-event" value="Weigeren">
                                                                        </div>
                                                                    </form>--}}
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
                            <th>Rol</th>
                            <th>Operaties</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->period }}</td>
                                <td>{{ $course->test_method}}</td>
                                <td>Nog niks</td>
                                <td>
                                    <form action="/#" method="GET">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success d-flex float-right" value="Wijzigen">
                                        </div>
                                    </form>

                                    <form class="float-right" method="POST" action="/#">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-danger d-flex float-right delete-course" value="Verwijderen">
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
