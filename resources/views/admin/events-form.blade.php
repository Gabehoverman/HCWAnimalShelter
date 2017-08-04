@extends('layouts.master')

@section('title', 'Add Events')

@section('pageCss')

    <link href="/css/admin.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@stop

@section('content')
    <div class="container">
        @if($event->title)
            <h3>Add New Event</h3>
        @else
            <h3>Update Event</h3>
        @endif
        <form action="/admin/event/add" method="POST">
            <input type="hidden" id="event_id" name="event_id" value="{{$event->id}}">
            {{-- !!! NEED THIS ON ALL SUBMITTED FORMS !!! --}}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="input-field col s12 m6">
                    <input placeholder="Title" name="title" id="title" type="text" value="{{$event->title}}" required class="validate">
                    <label for="title">Event Title</label>
                </div>
                <div class="input-field col s12 m6">
                    <input placeholder="Date" name="date" id="date" type="date" value="{{$event->date}}" class="datepicker">
                    <label class="active" for="date">Date</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input placeholder="Description" name="description" id="description" type="text" value="{{$event->description}}" required class="validate">
                    <label for="description">Description</label>
                </div>
                <div class="input-field col s12 m3">
                    <input placeholder="Start Time" name="start_time" id="startTime" type="time" value="{{$event->start_time}}" required class="validate">
                    <label class="active" for="startTime">Start Time</label>
                </div>
                <div class="input-field col s12 m3">
                    <input placeholder="End Time" name="end_time" id="endTIme" type="time" value="{{$event->end_time}}" required class="validate">
                    <label class="active" for="endTIme">End Time</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="Address One" name="addressOne" id="addressOne" type="text" value="{{$event->address->address1}}" required class="validate">
                    <label for="addressOne">Address One</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input placeholder="Address Two" name="addressTwo" id="addressTwo" type="text" value="{{$event->address->address2}}" class="validate">
                    <label for="addressTwo">Address Two</label>
                </div>
                <div class="input-field col s12 m2">
                    <input placeholder="City" name="city" id="city" type="text" value="{{$event->address->city}}" required class="validate">
                    <label for="">City</label>
                </div>
                <script>
                    $(document).ready(function() {
                        $('select').material_select();
                    });
                </script>
                <div class="input-field col s6 m2">
                    <select name="state" id="state" class="selector validate" required>
                        <option value="48" selected >West Virginia</option>
                        @foreach($states as $state)
                            <option value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                    </select>
                    <label>State</label>
                </div>
                {{--<div class="input-field col s6 m2">--}}
                    {{--<select name="state" id="state" class="selector">--}}
                        {{--<option value="" disabled selected>Choose your option</option>--}}
                        {{--<option value="1">Option 1</option>--}}
                        {{--<option value="2">Option 2</option>--}}
                        {{--<option value="3">Option 3</option>--}}
                    {{--</select>--}}
                    {{--<label for="state">State</label>--}}
                {{--</div>--}}
                <div class="input-field col s6 m2">
                    <input placeholder="Zip" name="zip" id="zip" type="text" value="{{$event->address->zip}}" required class="validate">
                    <label class="active" for="zip">Zip</label>
                </div>
            </div>
            <div class="col s6 m4" style="padding-bottom: 35px;">
                <input type="submit" value="submit" class="btn blue"/>
            </div>
        </form>
    </div>
@stop

@section('pageScripts')
    <script>
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });

        $(document).ready(function() {
            $('select').material_select();
        });
    </script>
@stop