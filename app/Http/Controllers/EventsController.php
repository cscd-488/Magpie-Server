<?php
/**
 * @author Benjamin Daschel
 * Date: 1/23/16
 */

namespace App\Http\Controllers;


use App\Models\Event;
use Illuminate\Http\Request;

class EventsController
{

    public function getEvents(Request $request)
    {

        return Event::with('locations')->get();
    }

    public function postEvent(Request $request)
    {

    }

}