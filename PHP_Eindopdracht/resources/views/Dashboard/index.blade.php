@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row pb-4  pt-4">
            <div class="col-lg-4 col-lg-offset-1">
                <h1>Scan de code</h1>
                <img src="https://api.qrserver.com/v1/create-qr-code/?data=%7B%7B url('http://127.0.0.1:8000/dashboard') }}&size=220x220&margin=0" alt="qrcode">
            </div>
            <div class="col-lg-8 col-lg-offset-1 d-flex justify-content-center">
                <progress class="pt-4" value="{{ $totalstudypoints ?? "0" }}" max="180" style="width: 100%;"></progress>
            </div>
        </div>
        <hr>

        @foreach($periodes as $period)
            <h2>Jaar {{ $period }}</h2>
            <div class="row">
                @foreach($blocks as $block)
                <div class="col-lg-3" style="border: 1px solid black">
                    <div class="d-flex justify-content-between">
                        <p>Blok {{ $count += 1 }}</p>
                        <progress class="mt-1" value="{{ $totalstudypoints ?? "0" }}" max="15" style="width: 70%;"></progress>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 ml-2"><strong>Course</strong></div>
                        <div class="col-lg-3"><strong>Cijfer</strong></div>
                        <div class="col-lg-3 mr-2"><strong>Punten</strong></div>
                    </div>
                    <div class="row">
                        @foreach($courses as $course)
                            @if($course->year == $period)
                                @if((($course->period-1) % 4) + 1 == $block)
                                <div class="col-lg-4 ml-2">
                                    {{ $course->name }}
                                </div>
                                <div class="col-lg-3">
                                    {{ $course->grade }}
                                </div>
                                <div class="col-lg-3 mr-2">
                                    <div class="d-flex justify-content-between">
                                        <span>
                                            @if($course->finished != null)
                                                {{ $course->study_points }}
                                            @else
                                                0
                                            @endif
                                            / {{ $course->study_points }}
                                        </span>
                                    </div>
                                </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                    <br>
                    <div class="row" style="border-top: 1px solid black">
                        <span>Totaal behaalde studiepunten: 0 / 15</span>
                    </div>
                </div>
                @endforeach
            </div>
            <br>
        @endforeach

    </div>

@endsection
