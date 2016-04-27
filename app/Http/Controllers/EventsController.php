<?php

namespace App\Http\Controllers;


use App\Models\Checkpoint;
use App\Models\Event;
use Illuminate\Http\Request;

class EventsController
{

    public function pullData(Request $request) {

        //evaluate request

        $api_code = $request->get('requestcode');

        if(is_numeric($api_code) || $api_code == null) {

            switch($api_code) {
                case 1:
                    return $this->getEventsWithLocations();
                case 2:
                    return $this->getEvents();
                case 3:
                    return $this->getEventByLocation($request);
                default:
                    abort('400', 'api code does not exist');
            }

        }
        else {
            abort('400', 'api code null or non numeric');
        }

    }

    /* Return event's with locations */
    private function getEventsWithLocations()
    {
        return Event::with('checkpoints')->get();
    }

    /* Return list of events excluding locations */
    private function getEvents()
    {
        return Event::all();
    }


    // TODO: fix this. Returns checkpoint. Does not return event.
    private function getEventByLocation(Request $request)
    {
	    $checkpoint = Checkpoint::query()->findorFail($request->get('data'));
        return $checkpoint->has('event')->get();
    }

    public function visitLocation(Request $request)
    {
        // request header information
        $item = $request->get('data');      // location by id
        $opcode = $request->get('status');  // 1 or 0 indicating visit status

        //TODO: filter input and avoid SQL injection

        // build checkpoint
        $checkpoint = Checkpoint::query()->findorFail($item);
        $checkpoint->update(
            array('status' => $opcode) // TODO: need to add attribute to model and table in db.
        );

    }

    public function postEvent(Request $request)
    {

    }

}
