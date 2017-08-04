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

    <div class="card sticky-action">
        <div class="card-action row center-align no-margin" style="margin-left: 0; margin-right: 0;">
            <div class="col s4 center-align">
                <a class="center-align blue-text" href="/animal/{{$animal->id}}"><i class="material-icons">remove_red_eye</i></a>
            </div>
            <div class="col s4 center-align">
                <a class="center-align cyan-text" href="/admin/animals/update/{{$animal->id}}"><i class="material-icons">edit</i></a>
            </div>
            <div class="col s4 center-align">
                <a class="center-align red-text" href="#deleteModal" onclick="onDeleteStart({{$animal->id}})"><i class="material-icons">delete</i></a>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <h4>Delete Animal?</h4>
        <p>Are you sure you want to delete this animal?</p>
    </div>
    <div class="modal-footer">
        <a href="#!" id="deleteButton" onclick="onDeleteEnd()" class="modal-action modal-close waves-effect waves-red btn-flat">Delete</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
    </div>
</div>

@section('templateScripts')
<script type="text/javascript">

    var deleteBaseUrl = "/admin/animals/delete/";
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
@endsection