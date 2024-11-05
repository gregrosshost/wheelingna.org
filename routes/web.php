<?php

  use App\Http\Controllers\EventController;
  use App\Http\Controllers\EventVolunteerController;
  use App\Http\Controllers\PageController;
  use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');
//Route::get('/{page:slug}', [PageController::class, 'showPage'])->name('pages.show');

Route::get('/calendar/events/{id}',
    [EventController::class, 'showEvent']
)->name('calendar.events.event');

Route::get('/calendar/events/{eventId}/sign-ups',
    [EventVolunteerController::class, 'addVolunteer']
)->name('calendar.events.volunteer');

