@extends('layouts.master')

@section('title', 'Manage Animals')

@section('pageCss')

    <link href="/css/animals.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@stop

@section('content')
    <div class="container" style="padding-bottom: 15px;">
        <h3 class="center">{{$pageTitle}}</h3>

        <div class="row">
            <div class="col s12 right-align">
                {{--Pagination--}}
                {{$animals->links()}}
            </div>
        </div>

        @if(sizeof($animals) > 0)
            <div class="row">
                @foreach($animals as $animal)
                    <div class="col s6 m4">
                        @component('templates/animal-card', ['animal' => $animal]) @endcomponent
                    </div>
                @endforeach
            </div>
        @else
            <div class="row">
                <div class="col s12 m6">
                    @component('templates/alert', ['message' => 'There are currently no animals!']) @endcomponent
                </div>
            </div>
        @endif

        <hr>

        <div class="row">
            <div class="col s6 right-align">
                {{--Pagination--}}
                {{$animals->links()}}
            </div>
        </div>


    </div>
@stop
