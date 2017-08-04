@extends('layouts.master')

@section('title', 'Events')

@section('pageCss')

    <link href="/css/events.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@stop

@section('content')

    <div id="banner" class="parallax-container">
        <div class="section no-pad-bot">
            <div class="container mid">
                <br><br><br>
                <h1 class="header white-text text-darken-1"></h1>
                <div class="row">
                    <h5 class="header col s12 light white-text">A modern responsive front-end framework based on Material Design</h5>
                </div>
            </div>
        </div>
        <div class="parallax"><img src="/img/events-hero.png" alt="Unsplashed background img 1"></div>
    </div>
    <div class="container">
        <div class="section">

            <!--   Icon Section   -->
            <div class="container events">
                <div class="section events-section">

                    <h4 class="center">Upcoming Adoption Events</h4><br><br>
                    <div class="row events-row">
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop