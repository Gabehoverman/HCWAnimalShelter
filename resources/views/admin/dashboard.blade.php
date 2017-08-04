@extends('layouts.master')

@section('title', 'About')

@section('pageCss')

    <link href="/css/admin.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@stop

@section('content')
    <div class="container">
        <h4 class="center">Admin Dashboard</h4>
        <div class="row">

            <div class="col m4 s6">
                <a class="card admin-card hoverable clickable black-text" href="/admin/animals">
                    <div class="card-content center-align">
                        <i class="material-icons large blue-text">playlist_add</i><br>
                        <h4 class="center-align">Manage Animals</h4>
                        <p>Add and remove animals from the website.</p>
                    </div>
                </a>
            </div>
            <div class="col m4 s6">
                <a class="card admin-card hoverable clickable black-text" href="/admin/events">
                    <div class="card-content center-align">
                        <i class="material-icons large blue-text">event</i><br>
                        <h4 class="center-align">Manage Events</h4>
                        <p>Add and remove events from the calendar.</p>
                    </div>
                </a>
            </div>
            <div class="col m4 s6">
                <a class="card admin-card hoverable clickable black-text" href="/admin/settings">
                    <div class="card-content center-align">
                        <i class="material-icons large blue-text">settings</i><br>
                        <h4 class="center-align">Website Settings</h4>
                        <!--<span class="card-title">Card Title</span>-->
                        <p>Modify website settings.</p>
                    </div>
                </a>
            </div>

        </div>
    </div>

@stop