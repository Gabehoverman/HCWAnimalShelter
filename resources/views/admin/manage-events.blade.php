@extends('layouts.master')

@section('title', 'Manage Events')

@section('pageCss')

    <link href="/css/admin.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@stop

@section('content')
    <div class="container">
        <h3>Events Management</h3>
        <a class="btn blue" href="/admin/events/add">Add Event</a>
        @if(sizeof($events) > 0)
            <div class="row">
                @foreach($events as $event)
                    <div>
                        @component('templates/admin-events-card', ['event' => $event]) @endcomponent
                    </div>
                @endforeach
            </div>
        @else
            <div class="row">
                <p>No events scheduled</p>
            </div>
        @endif
    </div>
@stop