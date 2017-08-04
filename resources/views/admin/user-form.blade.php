@extends('layouts.master')

@section('title', 'Manage Animals')

@section('pageCss')

    <link href="/css/admin.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@stop

@section('content')

    <div class="container" style="padding-top: 15px; padding-bottom: 15px;">

        <div class="row">
            <div class="col s8">
                <h5>Add a new User </h5>
            </div>
            <div class="col s4 right-align">
                <a href="/admin/settings" class="btn cyan">Go Back</a>
            </div>
        </div>

        <p>
            You can use this form to add a new site admin.  The new admin will be able to login, change content, and update site statistics.
            They will also be able to create new users and delete other admins.
        </p>

        <form action="/admin/users/add" method="POST">

            @if($error)
                <div class="error-message red lighten-1">
                    {{$error}}
                </div>
            @endif

            {{-- !!! NEED THIS ON ALL SUBMITTED FORMS !!! --}}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="input-field col s12 m6">
                    <input placeholder="First Name" name="first_name" id="first_name" type="text" required class="validate">
                    <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s12 m6">
                    <input placeholder="Last Name" name="last_name" id="last_name" type="text" required class="validate">
                    <label for="last_name">Last Name</label>
                </div>

                <div class="input-field col s12">
                    <input placeholder="email@domain.com" id="email" name="email" type="email" required class="validate">
                    <label for="email">Email</label>
                </div>

                <div class="input-field col s12 m6">
                    <input placeholder="Password" name="password" id="password" type="password" required class="validate">
                    <label for="password">Password</label>
                </div>
                <div class="input-field col s12 m6">
                    <input placeholder="Password" name="password_confirm" id="password_confirm" type="password" required class="validate">
                    <label for="password_confirm">Re-Type Password</label>
                </div>
            </div>

            <input type="submit" class="btn green" value="Add New User"/>

        </form>

    </div>

@stop


@section('pageScripts')
    <script type="text/javascript">

    </script>
@stop