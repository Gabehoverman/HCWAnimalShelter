<div class="card">
    <div class="card-image waves-effect waves-block waves-light card-background-image"
         @if(sizeof($animal->animalPhotos) > 0)
         style="background-image: url('{{$animal->animalPhotos[0]->photo->url}}');"
         @else
         style="background-image: url('/img/dog_silhouette.png');"
            @endif
    >
        <a href="/animal/{{$animal->id}}"><img class="activator card-image" src="/img/transparent.png"/></a>
    </div>
    <div class="card-content">
        <span class="card-title grey-text text-darken-4">{{$animal->name}} <span class="grey-text float-right smaller-text-2">{{$animal->breed}}</span></span>
        @if($animal->adopted)
            <span class="badge green white-text">Adopted</span>
        @endif
        <div><a href="/animal/{{$animal->id}}">More Info</a></div>
    </div>
</div>
@section('templateScripts')
    <script type="text/javascript">

    </script>
@endsection