<?php

  namespace App\Livewire;

  use App\Models\Event;
  use Filament\Forms\Form;
  use Illuminate\View\View;
  use Livewire\Component;
  use Illuminate\Support\Facades\DB;
  use Filament\Forms;
  use Filament\Actions\Action;
  use Filament\Actions\Concerns\InteractsWithActions;
  use Filament\Actions\Contracts\HasActions;
  use Filament\Forms\Concerns\InteractsWithForms;
  use Filament\Forms\Contracts\HasForms;
  use Filament\Notifications\Notification;

  class VolunteerForm extends Component implements HasForms, HasActions
  {
    use InteractsWithForms;
    use InteractsWithActions;

    public ?array $data = [];
    public $event_id;
    public ?Event $event = null;


    public function mount($eventId): void
    {
      $this->event_id = $eventId;
      $this->event = Event::findOrFail($eventId);
      $this->form->fill();
    }

    public function form(Form $form): Form
    {
      return $form
          ->schema([
              Forms\Components\Section::make(fn() => $this->event->title)
                  ->description("See what others are bringing in the table under the form.")
                  ->schema([
                      Forms\Components\TextInput::make('name')
                          ->label('Your Name')
                          ->required()
                          ->maxLength(255),

                      Forms\Components\TextInput::make('food_item')
                          ->label('What are you bringing?')
                          ->required()
                          ->maxLength(255),

                      Forms\Components\TextInput::make('phone_number')
                          ->label('Phone Number')
                          ->tel()
                          ->maxLength(20),

                      Forms\Components\TextInput::make('email')
                          ->label('Email')
                          ->email()
                          ->maxLength(255),
                  ])
                  ->columns(2)
          ])
          ->statePath('data');
    }

    public function signUp(): Action
    {
      return Action::make('signUp')
          ->button()
          ->label('Sign Up to Bring Food')
          ->modalHeading('Sign Up - ' . $this->event->title)
          ->color('primary')
          ->form($this->getFormSchema())
          ->action(function (array $data): void {
            $data['signed_up_at'] = now()->toDateTimeString();

            DB::table('events')
                ->where('id', $this->event->id)
                ->update([
                    'volunteers' => DB::raw("JSON_ARRAY_APPEND(
                            COALESCE(volunteers, '[]'),
                            '$',
                            '" . json_encode($data) . "'
                        )")
                ]);

            Notification::make()
                ->success()
                ->title('Thank you for volunteering!')
                ->send();
          });
    }

    public function submit(): void
    {
      $volunteerData = $this->form->getState();
      $volunteerData['signed_up_at'] = now()->toDateTimeString();

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
      $this->form->fill();

      $this->dispatch('volunteer-saved');
    }

    public function save(): void
    {
        $data = $this->form->getState();
        
        try {
            $this->event->volunteers = collect($this->event->volunteers ?? [])
                ->push([
                    'name' => $data['name'],
                    'food_item' => $data['food_item'],
                    'signed_up_at' => now()->toISOString(),
                ]);
            
            $this->event->save();

            // Show success notification
            Notification::make()
                ->title('Successfully signed up!')
                ->success()
                ->send();

            // Reset form
            $this->form->fill();

            // Emit event to refresh parent component
            $this->dispatch('volunteer-added');
            
        } catch (\Exception $e) {
            Log::error('Volunteer signup failed', ['error' => $e->getMessage()]);
            
            Notification::make()
                ->title('Something went wrong')
                ->danger()
                ->send();
        }
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->label('Your Name')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('food_item')
                ->label('What are you bringing?')
                ->required()
                ->maxLength(255),
            
            Forms\Components\Actions::make([
                Action::make('save')
                    ->label('Sign Up')
                    ->submit()
            ]),
        ];
    }

    public function render()
    {
        return view('livewire.volunteer-form');
    }
  }