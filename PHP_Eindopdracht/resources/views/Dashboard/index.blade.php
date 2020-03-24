@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row pb-4  pt-4">
            <div class="col-lg-4 col-lg-offset-1">
                <h1>Scan de code</h1>
                <img src="https://api.qrserver.com/v1/create-qr-code/?data=%7B%7B url('http://127.0.0.1:8000/dashboard') }}&size=220x220&margin=0" alt="qrcode">
            </div>
            <div class="col-lg-8 col-lg-offset-1 d-flex justify-content-center">
                <progress></progress>
            </div>
        </div>
        <hr>
        <div class="row pb-4  pt-4">
            <div class="col-lg-12 col-lg-offset-1">

            </div>
        </div>
    </div>

@endsection
