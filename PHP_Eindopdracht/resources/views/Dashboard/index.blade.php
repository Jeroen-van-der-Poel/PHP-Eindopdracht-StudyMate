@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row pb-4  pt-4">
            <div class="col-lg-4 col-lg-offset-1">
                <h1>Scan de code</h1>
                <img src="https://api.qrserver.com/v1/create-qr-code/?data=%7B%7B url('http://127.0.0.1:8000/dashboard') }}&size=220x220&margin=0" alt="qrcode">
            </div>
            <div class="col-lg-8 col-lg-offset-1">
                <h2 class="d-flex justify-content-center">Voortgang Studie</h2>
                <br>
                <progress class="pt-4" value="{{ $totalstudypoints}}" max="{{ $totalAvailablePoint}}" style="width: 100%;"></progress>
                <div class="d-flex justify-content-between">
                    <span>0</span>
                    <span>{{ $totalAvailablePoint ?? "180" }}</span>
                </div>
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
                        @foreach($courses as $course)
                            @if($course->year == $period)
                                @if((($course->period-1) % 4) + 1 == $block)
                                     <progress class="mt-1" value="{{ $course->getTotalBlockPoints($course->year, $course->period) }}" max="{{ $course->getTotalReceivableBlockPoints($course->year, $course->period)}}" style="width: 70%;"></progress>
                                 @endif
                            @endif
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-3"><strong>Course</strong></div>
                        <div class="col-lg-3 ml-1"><strong>Cijfer</strong></div>
                        <div class="col-lg-5"><strong>Punten</strong></div>
                    </div>
                    <div class="row">
                        @foreach($courses as $course)
                            @if($course->year == $period)
                                @if((($course->period-1) % 4) + 1 == $block)
                                <div class="col-lg-3">
                                    {{ $course->name }}
                                </div>
                                <div class="col-lg-3 ml-1">
                                    {{ $course->grade }}
                                </div>
                                <div class="col-lg-5">
                                    <div class="d-flex justify-content-between">
                                        <span>
                                            @if($course->points_received != null)
                                                {{ $course->points_received }}
                                            @else
                                                0
                                            @endif
                                            / {{ $course->study_points }}
                                        </span>
                                    </div>
                                </div>

                                <div style="border-top: 1px solid black; width: 100%">
                                    <span class="ml-1">Totaal behaalde studiepunten:
                                        {{ $course->getTotalBlockPoints($course->year, $course->period) }}
                                        /
                                        {{ $course->getTotalReceivableBlockPoints($course->year, $course->period) }}
                                    </span>
                                </div>
                                @endif
                            @endif
                        @endforeach
                    </div>

                </div>
                @endforeach
            </div>
            <br>
        @endforeach

    </div>

@endsection
