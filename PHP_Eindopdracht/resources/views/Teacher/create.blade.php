@extends('layouts.layout')

@section('content')

    <div class="container pt-1 pb-5">
        <form action="/teacher" enctype="multipart/form-data" method="post">
            @csrf

            <div class="">
                <div class="col-6 offset-3">

                    <div class="form-group row">
                        <h2 class="pl-0 pt-5">Docent aanmaken</h2>
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
                        <label for="email" class="col-md-4 col-form-label pl-0">Email</label>

                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="phone_number" class="col-md-4 col-form-label pl-0">Telefoonnummer</label>

                        <input id="phone_number" type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" autocomplete="phone_number" autofocus>

                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row pt-3">
                        <input id="has_taught" type="checkbox" class="form-control" name="has_taught" value="1" style="height: 20px; width: 18px;">
                        <label for="has_taught" class="pl-0">Heeft jouw les gegeven </label>
                    </div>

                    <div class="form-group row pt-4 pb-5">
                        <button class="btn btn-primary">Docent Opslaan</button>
                    </div>

                </div>
            </div>
        </form>
    </div>

@endsection
