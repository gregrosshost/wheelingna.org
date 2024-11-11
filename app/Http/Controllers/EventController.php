<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
  public function showEvent($date)
  {
    $event = Event::whereDate('starts_at', $date)->firstOrFail();
    $event->starts_at = $event->starts_at->format('Y-m-d');
    return view('event', [
        'event' => $event
    ]);
  }
}
