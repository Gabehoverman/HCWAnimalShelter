@extends('layouts.master')

@section('title', 'Animals')

@section('pageCss')

    <link href="/css/animals.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@stop

@section('content')

    <div class="banner">
        <img src="/img/animals-page/adoptable-header.jpg">
        <div class="hide-on-small-only">
            <h2 class="white-text large-text-1">Find your next best friend</h2>
            {{--<br>--}}
            <h4 class="grey-text text-lighten-3 large-text-2">Browse the animals at our shelter</h4>
        </div>

        <div class="show-on-small hide-on-med-and-up white-text">
            <p class="flow-text">Find your next best friend <br> Browse the animals at our shelter</p>
        </div>
    </div>

    <div class="container">

        <h2>Our Animals</h2>

        <div class="row">
            <div class="col s12 m6">
                <div class="card hoverable clickable" onclick="goToAdoptable()">
                    <div class="card-image">
                        <img src="/img/animals-page/card1.jpg">
                        <span class="card-title">Our Adoptable Animals</span>
                    </div>
                </div>
            </div>

            <div class="col s12 m6">
                <div class="card hoverable clickable" onclick="goToAdopted()">
                    <div class="card-image">
                        <img src="/img/animals-page/card2.jpg">
                        <span class="card-title">Recently Adopted</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop


@section('pageScripts')
    <script type="text/javascript">
        var goToAdopted = function(){
            window.location.href = '/animals/adopted';
        };

        var goToAdoptable = function(){
            window.location.href = '/animals/adoptable';
        };
    </script>
@stop