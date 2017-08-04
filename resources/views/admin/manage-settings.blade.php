@extends('layouts.master')

@section('title', 'Manage Settings')

@section('pageCss')

    <link href="/css/admin.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@stop

@section('content')
    <div class="container" style="margin-bottom: 15px;">

        <div>
            <h4>Update Statistics</h4>
            <hr>
            <form method="POST" action="/admin/stats">
                {{-- !!! NEED THIS ON ALL SUBMITTED FORMS !!! --}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="row">
                    <div class="col m3 s6">
                        <div class="card black-text">
                            <div class="card-content center-align">
                                <i class="material-icons large blue-text">pets</i><br>
                                <h5 class="center-align">Intake</h5>
                                <input type="number" name="intake" class="validate centered-input"
                                       placeholder="{{isset($latestStat) ? $latestStat->intake : 0}}" required />
                            </div>
                        </div>
                    </div>
                    <div class="col m3 s6">
                        <div class="card black-text">
                            <div class="card-content center-align">
                                <i class="material-icons large blue-text">home</i><br>
                                <h5 class="center-align">Adopted</h5>
                                <input type="number" name="adopted" class="validate centered-input"
                                       placeholder="{{isset($latestStat) ? $latestStat->adopted : 0}}" required />
                            </div>
                        </div>
                    </div>
                    <div class="col m3 s6">
                        <div class="card black-text">
                            <div class="card-content center-align">
                                <i class="material-icons large blue-text">list</i><br>
                                <h5 class="center-align">Total</h5>
                                <input type="number" name="total" class="validate centered-input"
                                       placeholder="{{isset($latestStat) ? $latestStat->total : 0}}" required />
                            </div>
                        </div>
                    </div>
                    <div class="col m3 s6">
                        <div class="card black-text">
                            <div class="card-content center-align">
                                <i class="material-icons large blue-text">sentiment_very_dissatisfied</i><br>
                                <h5 class="center-align">Euthanized</h5>
                                <input type="number" name="euthanized" class="validate centered-input"
                                       placeholder="{{isset($latestStat) ? $latestStat->euthanized : 0}}" required />
                            </div>
                        </div>
                    </div>
                </div>

                <p>
                    The latest values for these statistics will be viewable by anyone who visits the site on the "About Us" page.
                    <br>
                    @if(isset($latestStat))
                        These statistics were last updated on {{date("F jS, Y", strtotime($latestStat->date))}}
                    @endif
                </p>

                <input type="submit" class="btn green waves-effect waves-light" value="Update Stats"/>
            </form>
        </div>

        <br>

        <div>
            <h4>Manage Users</h4>
            <hr>
            <div>
                <p>Below is the list of site admins.  These individuals can change information about animals, events, and statistics.</p>

                <table class="striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date Added</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->first_name}} {{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            {{--<td>{{(new \DateTime($user->created_at, new DateTimeZone("America/New_York")))->format("j M Y")}}</td>--}}
                            <td>{{ (new \DateTime($user->created_at, new \DateTimeZone("UTC")))
                                    ->setTimezone(new \DateTimeZone('America/New_York'))
                                     ->format("j M Y")
                                 }}
                            </td>
                            <td><a href="#deleteModal" onclick="onDeleteStart({{$user->id}})"><i class="material-icons red-text">close</i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <a class="btn green waves-effect waves-light" href="/admin/users/add">Add New User</a>

        </div>

    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <h4>Delete User?</h4>
            <p>Are you sure you want to delete this user?</p>
            @if(sizeof($users) <= 1)
                <p>
                    <i class="red-text material-icons">warning</i>
                    Be careful!  You may be deleting your own account or the last admin account!
                </p>
            @endif
        </div>
        <div class="modal-footer">
            <a href="#!" id="deleteButton" onclick="onDeleteEnd()" class="modal-action modal-close waves-effect waves-red btn-flat">Delete</a>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
        </div>
    </div>
@stop

@section('pageScripts')
    <script type="text/javascript">
        var deleteBaseUrl = "/admin/users/delete/";
        var deleteId = -1;

        var onDeleteStart = function(id){
            deleteId = id;
        };
        var onDeleteEnd = function(){
            window.location = deleteBaseUrl + deleteId;
        };

        //    Initialize modal and event listeners
        $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal').modal();
        });
    </script>
@stop
