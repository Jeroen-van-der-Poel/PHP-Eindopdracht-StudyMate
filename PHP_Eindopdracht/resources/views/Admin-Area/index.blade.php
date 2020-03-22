@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row pb-4  pt-4">
            <div class="col-lg-12 col-lg-offset-1">
                <div class="table-responsive">
                    <div class="card-header d-flex justify-content-between">
                        <span><i class="fas fa-users"></i>Docenten overzicht</span>
                        <span><a href="/addTeacher">Docenten Toevoegen</a></span>
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
                                <td>{{ $teacher->HasTaught() }}</td>

                                <td>
                                    <form action="/editTeacher/{{$teacher->id}}" method="GET">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success d-flex float-right" value="Wijzigen">
                                        </div>
                                    </form>

                                    <form class="float-right" method="POST" action="/#">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-danger d-flex float-right delete-event" value="Verwijderen">
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
                    <div class="card-header">
                        <i class="fas fa-chart-area"></i>
                        Vakken overzicht
                    </div>
                    <table class="table table-bordered table-striped">

                        <thead>
                        <tr>
                            <th>Naam</th>
                            <th>Periode</th>
                            {{--<th>Coördinator</th>--}}
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

                                <td>
                                    {{--                                    <form method="POST" action="/admin-area/users/accept-user/{{$user->id}}">
                                                                            @csrf
                                                                            {{ method_field('PUT') }}
                                                                            <div class="form-group">
                                                                                <select name="userRole" class="form-control">
                                                                                    @foreach($roles as $role)
                                                                                        @if($role->name == 'Company'|| $role->name=='Student' )
                                                                                            <option value="{{$role->name}}">{{$role->name}}</option>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="float-right">
                                                                                <button type="submit" class="btn btn-success float-left">Accept</button>
                                                                            </div>
                                                                        </form>

                                                                        <form class="float-right d-flex pr-2" method="POST" action="/admin-area/users/{{$user->id}}">
                                                                            {{ csrf_field() }}
                                                                            {{ method_field('DELETE') }}

                                                                            <div class="form-group d-flex">
                                                                                <input type="submit" class="btn btn-danger delete-user" value="Weigeren">
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
    </div>
@endsection
