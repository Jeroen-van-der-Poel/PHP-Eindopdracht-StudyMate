@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row pb-4  pt-4">
            <div class="col-lg-12 col-lg-offset-1">
                <div class="table-responsive">
                    <div class="card-header d-flex justify-content-between">
                        <span><i class="fas fa-clock"></i>Aankomende deadlines</span>
                        <span><a href="/addDeadline">Deadline Toevoegen</a></span>
                    </div>
                    <table class="table table-bordered table-striped">

                        <thead>
                        <tr>
                            <th>Opdracht</th>
                            <th>Vak</th>
                            <th>Docent</th>
                            <th>Tentamen/Inlever Datum</th>
                            <th>Categorie</th>
                            <th>Tags</th>
                            <th>Operaties</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($deadlines as $key => $deadline)

                            <tr>

                                <td>{{ $deadline->title }}</td>
                                @foreach($courses as $key => $course)
                                    @if($course->id === $deadline->courseid)
                                        <td>{{ $course->name }}</td>
                                    @endif
                                @endforeach
                                @foreach($teachers as $key => $teacher)
                                    @if($teacher->id === $deadline->teacherid)
                                        <td>{{ $teacher->name }}</td>
                                    @endif
                                @endforeach
                                <td>{{ $deadline->duedate }}</td>
                                <td>{{ $deadline->categorie }}</td>
                                <td>
                                    <ul>
                                    @foreach($deadline->tags as $tag)
                                        <li>{{ $tag->title }}</li>
                                    @endforeach
                                    </ul>
                                </td>

                                <td>
                                    <form action="" method="GET">
                                        <div class="form-group">
                                            <input id="finished" type="checkbox" class="form-control" name="finished" value="1" style="height: 25px;">
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

            <div class="row pb-4  pt-4">
                <div class="col-lg-12 col-lg-offset-1">
                    <div class="table-responsive">
                        <div class="card-header d-flex justify-content-between">
                            <span><i class="fas fa-clock"></i>Afgeronde deadlines</span>
                        </div>
                        <table class="table table-bordered table-striped">

                            <thead>
                            <tr>
                                <th>Opdracht</th>
                                <th>Vak</th>
                                <th>Docent</th>
                                <th>Tentamen/Inlever Datum</th>
                                <th>Categorie</th>
                                <th>Afgerond op</th>
                                <th>Operaties</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($finisheddeadlines as $key => $deadline)

                                <tr>

                                    <td>{{ $deadline->title }}</td>
                                    @foreach($courses as $key => $course)
                                        @if($course->id === $deadline->courseid)
                                            <td>{{ $course->name }}</td>
                                        @endif
                                    @endforeach
                                    @foreach($teachers as $key => $teacher)
                                        @if($teacher->id === $deadline->teacherid)
                                            <td>{{ $teacher->name }}</td>
                                        @endif
                                    @endforeach
                                    <td>{{ $deadline->duedate }}</td>
                                    <td>{{ $deadline->categorie }}</td>
                                    <td>{{ $deadline->finished }}</td>

                                    <td>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
    </div>
@endsection
