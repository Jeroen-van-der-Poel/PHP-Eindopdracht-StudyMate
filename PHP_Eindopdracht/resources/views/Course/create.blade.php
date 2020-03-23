@extends('layouts.layout')

@section('content')

    <div class="container pt-1 pb-5">
        <form action="/course" enctype="multipart/form-data" method="post">
            @csrf

            <div class="">
                <div class="col-6 offset-3">

                    <div class="form-group row">
                        <h2 class="pl-0 pt-5">Aanmaken vak</h2>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label pl-0">Naam</label>

                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="period" class="col-md-4 col-form-label pl-0">Periode</label>

                        <input id="period" type="number" class="form-control @error('period') is-invalid @enderror" name="period" value="{{ old('period') }}" required autocomplete="period" autofocus>

                        @error('period')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="coordinator" class="col-md-4 col-form-label pl-0">Coördinator</label>

                        <input id="coordinator" type="text" class="form-control @error('coordinator') is-invalid @enderror" name="coordinator" value="{{ old('coordinator') }}" required autocomplete="coordinator" autofocus>

                        @error('coordinator')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="test_method" class="col-md-4 col-form-label pl-0">Soort Examen</label>

                        <input id="test_method" type="text" class="form-control @error('test_method') is-invalid @enderror" name="test_method" value="{{ old('test_method') }}" required autocomplete="test_method" autofocus>

                        @error('test_method')
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
