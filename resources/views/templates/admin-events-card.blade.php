<div class="col s6">
    <div class="card darken-1">
        <div class="card-content black-text">
            <span class="card-title" id="inline"><h5 id="inline">{{$event->title}}</h5></span>
            <p style=" display: inline;">{{$event->date}}</p>
            <p style="float: right"><i class="material-icons">alarm_on</i> {{$event->start_time." - ".$event->end_time}}</p>
            <p class="description">{{$event->description}}</p>
        </div>
        <div class="card-action">
            <a href="/admin/events/update/{{$event->id}}">Edit Event</a>
        </div>
    </div>
</div>
