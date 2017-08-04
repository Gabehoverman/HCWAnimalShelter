<?php

namespace HCWS\Http\Controllers;

use HCWS\Models\Address;
use HCWS\Models\Event;
use HCWS\Models\State;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function getEvents()
    {
        $events = Event::with('address.state')->get();


        $calendarEntries = [];
        foreach($events as $event){
            $start_time_components = explode(":", $event->start_time);
            $end_time_components = explode(":", $event->end_time);
            $start_time_interval = new \DateInterval("PT".(int)$start_time_components[0]."H".(int)$start_time_components[1]."M");
            $end_time_interval = new \DateInterval("PT".(int)$end_time_components[0]."H".(int)$end_time_components[1]."M");
            $calendarEntries[] = \Calendar::event(
                $event->title, //event title
                false, //full day event?
                (new \DateTime($event->date))->add($start_time_interval), //start time
                (new \DateTime($event->date))->add($end_time_interval), //end time
                $event->id, //optionally, you can specify an event ID
                [
                    'className' => "clickable"
                ]
            );
        }
        $calendar = \Calendar::addEvents($calendarEntries)->setCallbacks([
            'eventClick' => 'eventClickCallback'
        ]);
        $test = compact('calendar')["calendar"];

        $data = array("events" => $events, "calendar" => compact('calendar'));
        return view('events', $data);
    }

    public function view($id) {
        $event = Event::with('address')->find($id);

        if(isset($event)) {
            $data = array("event"=>$event);
            return view('view-event', $data);
        } else {
            //no event found
        }
    }

    public function add() {
        $data = array();
        $states = State::all();
        $data['states'] = $states;

        $event = new Event();
        $data['event'] = $event;

        $event->address = new Address();
        $data['address'] = $event->address;

        $data['id'] = -1;

        return view('admin/events-form', $data);
    }

    public function update($id) {
        $data = array();
        $states = State::all();
        $data['states'] = $states;

        $address = Address::all();
        $data['address'] = $address;

        $event = Event::with('address')->find($id);
        $data['event'] = $event;

        $data['id'] = $id;

        return view('admin/events-form', $data);
    }

    /**
     * @param Request $req
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateEvent(Request $req) {

        $event_id = $req->get("event_id");

        if($event_id) {
            $event = Event::find($event_id);
            $address_id = $event->address_id;
            $address = Address::find($address_id);
        } else {
            $event = new Event();
            $address = new Address();
        }

        $address->address1 = $req->get("addressOne","");
        $address->address2 = $req->get("addressTwo","");
        $address->city = $req->get("city","");
        $address->state_id = 48;
        $address->zip = $req->get("zip","");

        $address->save();

        $event->title = $req->get("title","");
        $event->date = new \DateTime($req->get("date"));
        $test = $req->get("start_time");
//        $event->start_time = date("H:m:s",intval($req->get("start_time","")));
        $event->start_time = $req->get("start_time","");
//        $event->end_time = date("H:m:s",intval($req->get("end_time","")));
        $event->end_time = $req->get("end_time","");
        $event->description = $req->get("description","");
        $event->address_id = $address->id;

        $event->save();

        return redirect('/admin/events');
    }
}
