@extends('layouts.master')

@section('title', 'Animals')


@section('pageCss')
    <link href="/css/landing.css" rel="stylesheet" type="text/css" media="screen,projection">
@stop

@section('content')
    <div id="index-banner" class="parallax-container">
        <div class="section no-pad-bot">
            <div class="container mid">
                <br><br>
                <h1 class="header white-text text-darken-1">Huntington Cabell-Wayne Animal Shelter</h1>
                <div class="row">
                    <h5 class="header col s12 light white-text">
                        Serving the Huntington Cabell-Wayne and the surrounding area.
                    </h5>
                </div>
                <div class="row">
                    <a href="/animals/adoptable" id="download-button" class="btn-large waves-effect waves-light blue darken-1">
                        Find Your Friend
                    </a>
                </div>
                <br><br>

            </div>
        </div>
        <div class="parallax"><img src="/img/hero-dog.png" alt="Unsplashed background img 1"></div>
    </div>


        <div class="container">
            <div class="section">

                <!--   Icon Section   -->
                <div class="row">
                    <div class="col m4 s12">
                        <a class="card admin-card hoverable clickable black-text" href="/animals">
                            <div class="card-content center-align">
                                <i class="material-icons large blurb">pets</i><br>
                                <h4 class="center-align">Our Animals</h4>
                                <p>Browse current and recently adopted animals at the shelter.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col m4 s12">
                        <a class="card admin-card hoverable clickable black-text" href="/events">
                            <div class="card-content center-align">
                                <i class="material-icons large blurb">event</i><br>
                                <h4 class="center-align">Events</h4>
                                <p>Find information about our upcoming adoption days and other special events.</p>
                            </div>
                        </a>
                    </div>
                    <div class="col m4 s12">
                        <a class="card admin-card hoverable clickable black-text" href="/about">
                            <div class="card-content center-align">
                                <i class="material-icons large blurb">info_outline</i><br>
                                <h4 class="center-align">About Us</h4>
                                <!--<span class="card-title">Card Title</span>-->
                                <p>Learn more about about our mission and our shelter.</p>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>


    <div class="parallax-container valign-wrapper parallax-content">
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row center">
                    <div class="col s6"></div>
                    <div class="col s6">
                        <h4>We pride ourselves on connecting animals and their new owners, every day.</h4>
                    </div>
                    <h5 class="header col s12 white-text"></h5>
                </div>
            </div>
        </div>
        <div class="parallax"><img src="/img/final_cta.jpg" alt="Unsplashed background img 2"></div>
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
            <h2>What we do</h2>
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


    <div class="parallax-container valign-wrapper cta-cont">
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row center ">
                    <h3 class="header col s12 text-lighten-2">Your New Best Friend Awaits</h3>
                    <h5 class="header col s12 light white-text">Browse our gallery of adoptable pets to find your new furry friend.</h5>
                    <a href="/animals/adoptable" id="download-button cta-button" class="btn-large waves-effect waves-light blue darken-1">View All Animals</a>
                </div>
            </div>
        </div>
        <div class="parallax"><img src="/img/final_cta2.jpg" alt="Unsplashed background img 3"></div>
    </div>
@stop