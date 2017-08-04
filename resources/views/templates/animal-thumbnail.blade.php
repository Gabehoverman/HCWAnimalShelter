<div class="card-background-image"
     @if(isset($photo))
        style="background-image: url('{{$photo->url}}');"
     @else
        style="background-image: url('/img/dog_silhouette.png');"
    @endif
>
    <img src="/img/transparent.png"/>
</div>