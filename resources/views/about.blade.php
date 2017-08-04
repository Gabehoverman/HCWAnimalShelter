@extends('layouts.master')

@section('title', 'About')

@section('pageCss')
    <link href="/css/about.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@stop

@section('content')

    <div id="banner" class="parallax-container">
        <div class="section no-pad-bot">
            <div class="container mid">
                <br><br><br>
                <h1 class="header white-text text-darken-1">Learn A Little About Us</h1>
                {{--<div class="row">--}}
                    {{--<h5 class="header col s12 light white-text">A modern responsive front-end framework based on Material Design</h5>--}}
                {{--</div>--}}
            </div>
        </div>
        <div class="parallax"><img src="/img/about-hero.jpg" alt="Unsplashed background img 1"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col middle mid-border">
                <h2>Our Mission</h2>
                <p>
                    The Huntington Cabell-Wayne Animal Shelter is dedicated to serving Cabell and Wayne counties by saving abandoned dogs and cats and placing them into loving homes.
                    We are passionate about animals and strive to provide the animals under our protection with the
                    utmost care and compassion during their time with us.

                </p>
            </div>
            <div class="col middle">
                <h2>About Us</h2>
                <p>
                    Everyday we meet new people and animals!  Our shelter environment is full of care, hard work, and an absolute
                    love for animals.  The shelter is currently undergoing continuous construction as we strive to be the best we can be.
                    <br>
                    If you have any questions please message, call, or stop by the shelter.
                    The animals would love to see your smiling face!

                </p>
            </div>
        </div>
    </div>

    {{--<!- STATS BLURBS -!>--}}
    <div class="row stats-row">
        <div class="container">
        <h3 id="header" class="middle">Some Of Our Stats</h3>
        <div class="col s12 m4">
            <div class="icon-block">
                <h1 class="center blue-text"><i class="material-icons">pets</i></h1>
                <h3 class="center">{{ $stat->intake }}</h3>
                <h6 class="center">Animals Taken In</h6>

                <p class="light"></p>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="icon-block">
                <h1 class="center blue-text"><i class="material-icons">home</i></h1>
                <h3 class="center">{{$stat->adopted}}</h3>
                <h6 class="center">Animals Adopted</h6>

                <p class="light"></p>
            </div>
        </div>

        <div class="col s12 m4">
            <div class="icon-block">
                <h1 class="center blue-text"><i class="material-icons">sentiment_very_dissatisfied</i></h1>
                <h3 class="center">{{$stat->euthanized}}</h3>
                <h6 class="center">Animals Euthanized</h6>

                <p class="light"></p>
            </div>
        </div>
        </div>
    </div>
    <div class="parallax-container cta">>
        <div class="middle">
            <h3>Want To Know More?</h3>
            <a class="btn-large waves-effect waves-light blue darken-1" href="/contact">Get In Touch</a>
        </div>
        <div class="parallax"><img src="/img/events-hero.png" alt="Unsplashed background img 1"></div>
    </div>
@stop