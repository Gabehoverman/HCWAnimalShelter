@extends('layouts.master')

@section('title', 'Manage Animals')

@section('pageCss')

    <link href="/css/admin.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@stop

@section('content')

    <div class="container">

        <div class="row">
            <div class="col s8">
                <h5>@if($id < 0)Add a new Animal @else Update Animal @endif</h5>
            </div>
            <div class="col s4 right-align">
                <a href="/admin/animals" class="btn cyan">Go Back</a>
            </div>
        </div>

        <form @if($id < 0) action="/admin/animals/add" @else action="/admin/animals/update" @endif method="POST">
            <input type="hidden" id="animal_id" name="animal_id" value="{{$animal->id}}"/>
            {{-- !!! NEED THIS ON ALL SUBMITTED FORMS !!! --}}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="input-field col s12 m6">
                    <input placeholder="Name" name="name" id="name" type="text" value="{{$animal->name}}" required class="validate">
                    <label for="name">Animal Name</label>
                </div>
                <div class="input-field col s12 m6">
                    <select id="animal_type_id" name="animal_type_id" class="validate" required>
                        <option value="" disabled @if( !$animal->animal_type_id) selected @endif>Choose your option</option>
                        @foreach($types as $type)
                            <option value="{{$type->id}}" @if($type->id == $animal->animal_type_id) selected @endif>{{$type->name}}</option>
                        @endforeach
                    </select>
                    <label for="animal_type_id">Animal Type</label>
                </div>

                <div class="input-field col s12 m6">
                    <input placeholder="Breed" id="breed" name="breed" type="text" value="{{$animal->breed}}" required class="validate">
                    <label for="breed">Breed</label>
                </div>
                <div class="input-field col s12 m6">
                    <p>
                        <input type="checkbox" id="adopted" name="adopted" @if($animal->adopted) value="1" checked @else value="0" @endif onchange="adoptedChanged()" />
                        <label for="adopted">Adopted</label>
                    </p>
                </div>
            </div>

            <div class="row">
                <div id="adopted_fields" @if(!$animal->adopted) class="hidden" @endif>
                    <div class="input-field col s12 m6">
                        <input placeholder="Adopter Name" value="{{$animal->adopter_name}}" id="adopter_name" name="adopter_name" type="text" class="validate">
                        <label for="adopter_name">Adopter Name</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input placeholder="Date" id="adoption_date" name="adoption_date" type="date" value="{{$animal->adoption_date}}" class="datepicker">
                        <label for="adoption_date">Date Adopted</label>
                    </div>
                </div>

                <div class="input-field col s12">
                    <textarea id="description" name="description" class="materialize-textarea" data-length="5000">{{$animal->description}}</textarea>
                    <label for="description">Description</label>
                </div>

                <div class="col s12">
                    <h6><strong>Animal Photos</strong></h6>
                    <div class="row">
                        @foreach($animal->animalPhotos as $animalPhoto)
                            <div id="photo-{{$animalPhoto->photo->id}}" class="col s4 m3 center-align animal-thumbnail">
                                @component('templates/animal-thumbnail', ['photo' => $animalPhoto->photo]) @endcomponent
                                <input type="button" class="btn red waves-effect waves-light" value="Remove Image" onclick="deleteAnimalPhoto({{$animalPhoto->photo->id}})"></input>
                            </div>
                        @endforeach
                    </div>
                    <input type="hidden" id="deleted_photo_ids" name="deleted_photo_ids"/>

                    <input type="button" class="btn blue" id="upload-image-button"/>
                    <input type="hidden" id="upload_ids" name="upload_ids"/>
                </div>

                <div class="col s6 m4" style="padding-top: 15px;">
                    <input type="submit" value="submit" class="btn blue"/>
                </div>
            </div>


        </form>

    </div>

@stop


@section('pageScripts')
    <script type="text/javascript">
        var upload_ids = "";
        cloudinary.applyUploadWidget(document.getElementById('upload-image-button'),
                { upload_preset: 'o8ihsbiq', cloud_name: "{{env("CLOUDINARY_CLOUD_NAME", "")}}", api_key: "{{env("CLOUDINARY_KEY")}}",
                    button_class: "btn blue"},
                function(error, result) {console.log(error, result)});

        $(document).on('cloudinarywidgetsuccess', function(e, data) {
            for(var i=0; i < data.length; i++){
                var upload_id = data[i].public_id;
                if(!upload_ids.length){
                    upload_ids = upload_id;
                } else{
                    upload_ids += ", " + upload_id;
                }
            }

            // update the field on the form
            $("#upload_ids").val(upload_ids);
        });

        // Initialize the select element
        $(document).ready(function() {
            $('select').material_select();
        });

        // Initialize date picker
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });

        var adoptedChanged = function(event){
            if($('#adopted')[0].checked){
                $('#adopted_fields').removeClass("hidden");
                $('#adopted').val("1");
            } else{
                $('#adopted_fields').addClass("hidden");
                $('#adopted').val("0");
            }
        };

        var deleted_photo_ids = "";
        var deleteAnimalPhoto = function(id){
            // update the list of deleted photo submitted with the form
            if(deleted_photo_ids.length > 0){
                deleted_photo_ids += ", " + id;
            } else{
                deleted_photo_ids = id + "";
            }
            // hide the image
            $('#photo-' + id).addClass("hidden");

            // update the field on the form
            $("#deleted_photo_ids").val(deleted_photo_ids);
        }

    </script>
@stop