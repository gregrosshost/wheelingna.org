<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventVolunteerController extends Controller
{
    public function addVolunteer($date)
    {
      $event = Event::whereDate('starts_at', $date)->firstOrFail();
      $event->starts_at = $event->starts_at->format('Y-m-d');
      return view('sign-ups', [
         'event' => $event
      ]);
    }
}
