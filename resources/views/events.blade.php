@extends('layouts.master')

@section('title', 'Events')

@section('pageCss')

    <link href="/css/events.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="/lib/fullcalendar/dist/fullcalendar.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@stop

@section('content')

    {{--<div id="banner" class="parallax-container">--}}
        {{--<div class="section no-pad-bot">--}}
            {{--<div class="container mid">--}}
                {{--<br><br><br>--}}
                {{--<h1 class="header white-text text-darken-1">Upcoming Adoption Events</h1>--}}
                {{--<div class="row">--}}
                    {{--<h5 class="header col s12 light white-text">Find info about exciting events coming up at our shelter</h5>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="parallax"><img src="/img/events-hero-2.png" alt="Adoption Events Image"></div>--}}
    {{--</div>--}}

    {{--Events Listing--}}
    <div class="container">

        <h2>Upcoming Adoption Events</h2>
        <hr>

        {{--Calendar--}}
        <div class="row">
            <div class="col s12 m8 l6">
                {!! $calendar["calendar"]->calendar() !!}
            </div>

            @foreach($events as $event)
                <div class="col s12 m4 l6 hidden event-display" id="event-display-{{$event->id}}">
                    <h5>{{$event->title}}</h5>
                    {{--<hr>--}}
                    <h6 class="blue-text">What</h6>
                    <hr style="height: 2px;" class="blue blue-text">
                    <p>
                        {!! nl2br(e($event->description)) !!}
                    </p>
                    <div class="row">
                        <div class="col s6">
                            <h6 class="blue-text">When</h6>
                            <hr style="height: 2px;" class="blue blue-text">
                            <p>
                                {{date("M j, Y", strtotime($event->date))}}<br>
                                Starts: {{date("g:i A", strtotime($event->start_time))}}<br>
                                Ends&nbsp;&nbsp;: {{date("g:i A", strtotime($event->end_time))}}
                            </p>
                        </div>
                        <div class="col s6">
                            <h6 class="blue-text">Where</h6>
                            <hr style="height: 2px;" class="blue blue-text">
                            <p>
                                {{$event->address->address1}}<br>
                                @if(isset($event->address->address2))
                                    {{$event->address->address2}}<br>
                                @endif
                                {{$event->address->city}}, {{$event->address->state->abbreviation}}  {{$event->address->zip}}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        {{--<div class="section">--}}
            {{--@foreach($events as $event)--}}
            {{--<div class="row">--}}
                {{--<div class="col s6 m4">--}}
                    {{--<div class="card darken-1">--}}
                        {{--<div class="card-content black-text">--}}
                            {{--<span class="card-title" id="inline"><h5 id="inline">{{$event->title}}</h5></span>--}}
                            {{--<p style="float: right">--}}
                            {{--<p class="description">{{$event->description}}</p>--}}
                            {{--<p>--}}
                                {{--<i class="material-icons">alarm_on</i>--}}
                                {{--Starts: {{date("g:i A", strtotime($event->start_time))}}--}}
                            {{--</p>--}}

                            {{--<p>--}}
                                {{--<i class="material-icons">alarm_off</i>--}}
                                {{--Ends: {{date("g:i A", strtotime($event->end_time))}}--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--@endforeach--}}

        {{--</div>--}}
    </div>

@stop

@section('pageScripts')
    <script type="text/javascript" src="/lib/fullcalendar/dist/fullcalendar.min.js"></script>
    {!! $calendar["calendar"]->script() !!}

    <script type="text/javascript">
        var eventClickCallback = function(event, jsEvent, view){
            // See FullCalendar docs here: https://fullcalendar.io/docs/mouse/eventClick/
            $(".event-display").addClass("hidden");
            $("#event-display-" + event.id).removeClass("hidden");
        }
    </script>
@stop