@extends('layouts.master')

@section('title', 'Animals')

@section('pageCss')

    <link href="/css/animals.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@stop

@section('content')

    <div class="container" style="margin-top: 1em;">

        <div class="row">
            <div class="col s12 m6 l5">
                @if(sizeof($animal->animalPhotos) > 0)
                    <div class="slider">
                        <ul class="slides">

                            @foreach($animal->animalPhotos as $index=>$animalPhoto)
                            <li>
                                <img class="materialboxed waves-effect waves-light" src="{{$animalPhoto->photo->url}}"/>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <div class="card-image waves-effect waves-block waves-light card-background-image"
                         style="background-image: url('/img/dog_silhouette.png');"
                         id="animal-image-index-0">
                        <img class="card-image" style="width: 100%;" src="/img/transparent.png"/>
                    </div>
                @endif
            </div>
            <div class="col s12 m6 l7 flow-text">
                <h4>
                    {{$animal->name}}

                    @if($animal->adopted)
                        <span class="badge green white-text">Adopted!</span>
                    @else
                        <span class="badge red white-text">Seeking Adoption!</span>
                    @endif
                </h4>
                <hr style="height: 2px;" class="green green-text">
                <strong>Name: </strong> {{$animal->name}} <br>
                <strong>Type: </strong> {{$animal->type->name}} <br>
                <strong>Breed: </strong> {{$animal->breed}} <br>
                @if($animal->adopted)
                    <strong>Adopted By: </strong> {{$animal->adopter_name}} on {{$animal->adoption_date}}
                @else
                    <strong>Status: </strong> <span class="red-text">Seeking Adoption!</span>
                @endif


            </div>

            <div class="col s12 flow-text">

                <hr style="height: 2px; width: 80%" class="green green-text">
                {!! nl2br(e($animal->description)) !!}
            </div>
        </div>
    </div>
@stop

@section('pageScripts')
    <script type="text/javascript">
        $('.materialboxed').materialbox();
        $('.slider').slider();
    </script>
@stop