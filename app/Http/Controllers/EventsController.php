<?php

namespace App\Http\Controllers;


use App\Models\Event;
use Illuminate\Http\Request;

class EventsController
{

    public function getEvents(Request $request)
    {
        return Event::with('checkpoints')->get();
    }

    public function postEvent(Request $request)
    {

    }

}