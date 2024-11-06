<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function showEvent($id)
    {
      $event = Event::findOrFail($id);
      return view('event', [
         'event' => $event
      ]);
    }
}
