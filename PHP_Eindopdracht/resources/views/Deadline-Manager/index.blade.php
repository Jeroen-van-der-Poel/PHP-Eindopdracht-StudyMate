@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row pb-4  pt-4">
            <div class="col-lg-12 col-lg-offset-1">
                 <h2>Sorteren</h2>
                <span>
                    <a href="/deadline">Default</a> |
                    <a href="/deadline?sort=teacher_id">Docent</a> |
                    <a href="/deadline?sort=course_id">Course</a> |
                    <a href="/deadline?sort=duedate">Tijdstip</a> |
                    <a href="/deadline?sort=exam_method_id">Categorie</a>
                </span>
            </div>
        </div>

        <form action="/deadline/edit" enctype="multipart/form-data" method="post">
            @csrf
            @method('PATCH')
        <div class="row pb-4  pt-4">
            <div class="col-lg-12 col-lg-offset-1">
                <div class="table-responsive">
                    <div class="card-header d-flex justify-content-between">
                        <span><i class="fas fa-clock"></i>Openstaande deadlines</span>
                        <span><a href="/addDeadline">Deadline Toevoegen</a></span>
                    </div>
                    <table class="table table-bordered table-striped">

                        <thead>
                        <tr>
                            <th>Opdracht</th>
                            <th>Course</th>
                            <th>Docent</th>
                            <th>Tentamen/Inlever Datum</th>
                            <th>Categorie</th>
                            <th>Tags</th>
                            <th>Afronden</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($deadlines as $key => $deadline)

                            <tr>

                                <td>{{ $deadline->title }}</td>
                                <td>{{ $deadline->GetCourse($deadline->course_id) }}</td>
                                <td>{{ $deadline->GetTeacher($deadline->teacher_id)}}</td>
                                <td>{{ $deadline->duedate }}</td>
                                <td>{{ $deadline->Exam($deadline->exam_method_id)}}</td>
                                <td>
                                    <ul>
                                    @foreach($deadline->tags as $tag)
                                        <li>{{ $tag->title }}</li>
                                    @endforeach
                                    </ul>
                                </td>

                                <td>
                                        <div class="form-group">
                                            <input id="finished" type="checkbox" class="form-control" name="finished[]" value="{{ $deadline->id}} " style="height: 25px;">
                                        </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="form-group mr-1 row d-flex justify-content-end">
                    <button class="btn btn-primary" style="width: 100px">Opslaan</button>
                </div>
            </div>
        </div>

            <div class="row pb-4">
                <div class="col-lg-12 col-lg-offset-1">
                    <div class="table-responsive">
                        <div class="card-header d-flex justify-content-between">
                            <span><i class="fas fa-clock"></i>Afgeronde deadlines</span>
                        </div>
                        <table class="table table-bordered table-striped">

                            <thead>
                            <tr>
                                <th>Opdracht</th>
                                <th>Course</th>
                                <th>Docent</th>
                                <th>Tentamen/Inlever Datum</th>
                                <th>Categorie</th>
                                <th>Tags</th>
                                <th>Afgerond op</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($finisheddeadlines as $key => $deadline)

                                <tr>

                                    <td>{{ $deadline->title }}</td>
                                    <td>{{ $deadline->GetCourse($deadline->course_id) }}</td>
                                    <td>{{ $deadline->GetTeacher($deadline->teacher_id)}}</td>
                                    <td>{{ $deadline->duedate }}</td>
                                    <td>{{ $deadline->Exam($deadline->exam_method_id)}}</td>
                                    <td>
                                        <ul>
                                            @foreach($deadline->tags as $tag)
                                                <li>{{ $tag->title }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ $deadline->finished }}</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
