<?php

  namespace App\Livewire;

  use App\Models\Event;
  use Illuminate\View\View;
  use Livewire\Component;
  use Illuminate\Support\Facades\DB;

  class VolunteerForm extends Component
  {
    public $event_id;
    public $name;
    public $phone_number;
    public $food_item;
    public ?Event $event = null;

    public function mount($eventId): void
    {
      $this->event_id = $eventId;
      $this->event = Event::findOrFail($eventId);
    }

    public function submit(): void
    {
      $volunteerData = [
          'name' => $this->name,
          'phone_number' => $this->phone_number,
          'food_item' => $this->food_item,
          'signed_up_at' => now()->toDateTimeString(),
      ];

      // Append new volunteer using JSON_ARRAY_APPEND
      DB::table('events')
          ->where('id', $this->event_id)
          ->update([
              'volunteers' => DB::raw("JSON_ARRAY_APPEND(
                    COALESCE(volunteers, '[]'),
                    '$',
                    '" . json_encode($volunteerData) . "'
                )")
          ]);

      session()->flash('success', 'Thank you for volunteering!');
      $this->reset(['name', 'phone_number', 'food_item']);
    }

    public function render(): View
    {
      return view('livewire.volunteer-form');
    }
  }