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
                    return $this->getLocationsByEvent($request);
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


    // TODO:
    /* Return list of locations by event */
    private function getLocationsByEvent(Request $request) {
        $checkpoint = new Checkpoint($request->header('data'));
        return $checkpoint->with('event')->get();
    }

    public function postEvent(Request $request)
    {

    }

}