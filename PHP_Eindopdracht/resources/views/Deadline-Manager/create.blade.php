@extends('layouts.Layout')

@section('content')
    <div class="container pt-1 pb-5">
        <form action="/deadline" enctype="multipart/form-data" method="post">
            @csrf

            <div class="">
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
                        <label for="teacherid" class="col-md-4 col-form-label pl-0">Docent</label>

                        <input id="teacherid" type="text" class="form-control @error('teacherid') is-invalid @enderror" name="teacherid" value="{{ old('teacherid') }}" required autocomplete="teacherid" autofocus>

                        @error('teacherid')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="courseid" class="col-md-4 col-form-label pl-0">Vak</label>

                        <input id="courseid" type="" class="form-control @error('courseid') is-invalid @enderror" name="courseid" value="{{ old('courseid') }}" required autocomplete="courseid" autofocus>

                        @error('courseid')
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
                        <label for="categorie" class="col-md-4 col-form-label pl-0">Categorie</label>

                        <input id="categorie" type="text" class="form-control @error('categorie') is-invalid @enderror" name="categorie" value="{{ old('categorie') }}" required autocomplete="categorie" autofocus>

                        @error('categorie')
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
