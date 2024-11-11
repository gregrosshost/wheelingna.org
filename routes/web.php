<?php

  use App\Http\Controllers\EventController;
  use App\Http\Controllers\EventVolunteerController;
  use App\Http\Controllers\PageController;
  use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');
//Route::get('/{page:slug}', [PageController::class, 'showPage'])->name('pages.show');

Route::get('/event/{eventDate}',
    [EventController::class, 'showEvent']
)->name('event');

Route::get('/event/{eventDate}/sign-ups',
    [EventVolunteerController::class, 'addVolunteer']
)->name('sign-ups');

