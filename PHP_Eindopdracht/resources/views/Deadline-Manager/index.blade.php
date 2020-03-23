@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row pb-4  pt-4">
            <div class="col-lg-12 col-lg-offset-1">
                <div class="table-responsive">
                    <div class="card-header d-flex justify-content-between">
                        <span><i class="fas fa-clock"></i>Deadline overzicht</span>
                        <span><a href="/addDeadline">Deadline Toevoegen</a></span>
                    </div>
                    <table class="table table-bordered table-striped">

                        <thead>
                        <tr>
                            <th>Opdracht</th>
                            <th>Vak</th>
                            <th>Docent</th>
                            <th>Datum</th>
                            <th>Categorie</th>
                            <th>Afgerond op</th>
                            <th>Operaties</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($deadlines as $key => $deadline)

                            <tr>

                                <td>{{ $deadline->title }}</td>
                                <td>{{ $courses->name->where('id', '==', $deadline->courseid) }}</td>
                                <td>{{ $teachers->name->where('id', '==', $deadline->teacherid) }}</td>
                                <td>{{ $deadline->duedate }}</td>
                                <td>{{ $deadline->categorie }}</td>
                                <td>{{ $deadline->finished }}</td>

                                <td>
                                    <form action="/editTeacher/{{$deadline->id}}" method="GET">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success d-flex float-right" value="Wijzigen">
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
@endsection
