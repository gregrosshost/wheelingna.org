<?php

  use App\Http\Controllers\EventController;
  use App\Http\Controllers\EventVolunteerController;
  use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/calendar/events/{id}',
    [EventController::class, 'showEvent']
)->name('calendar.events.event');

Route::get('/calendar/events/{eventId}/sign-ups',
    [EventVolunteerController::class, 'addVolunteer']
)->name('calendar.events.volunteer');
