<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventVolunteerController extends Controller
{
    public function addVolunteer($eventId)
    {
      $event = Event::findOrFail($eventId);

      return view('calendar.events.volunteer', [
         'event' => $event
      ]);
    }
}
