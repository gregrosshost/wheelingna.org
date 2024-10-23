<?php

  namespace App\Livewire;

  use App\Models\Reports\Report;
  use App\Models\Reports\SubCommitteeReport;
  use App\Models\Reports\GroupReport;
  use Filament\Forms;
  use Filament\Forms\Components\DatePicker;
  use Filament\Forms\Components\FileUpload;
  use Filament\Forms\Components\RichEditor;
  use Filament\Forms\Components\Section;
  use Filament\Forms\Components\Select;
  use Filament\Forms\Components\TextInput;
  use Filament\Forms\Concerns\InteractsWithForms;
  use Filament\Forms\Contracts\HasForms;
  use Filament\Forms\Form;
  use Filament\Notifications\Notification;
  use Illuminate\Support\Facades\Auth;
  use Livewire\Component;
  use Illuminate\Contracts\View\View;
  use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

  class ReportForm extends Component implements HasForms
  {
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
      $this->form->fill();
    }

    public function form(Form $form): Form
    {
      return $form
          ->schema([
              Section::make('Submit Report')
                  ->description('Please choose secretary, subcommittee, or group report below.')
                  ->schema([
                      DatePicker::make('date_submitted')
                          ->label('Date Submitted')
                          ->default(now())
                          ->hidden(),

                      TextInput::make('submitted_by')
                          ->label('Submitted By'),
//                          ->default(fn() => Auth::user()->name)
//                          ->disabled(),


                      Select::make('report_type')
                          ->options([
                              'secretary' => 'Secretary Report',
                              'subcommittee' => 'Sub-committee Report',
                              'group' => 'Group Report',
                          ])
                          ->required()
                          ->label('Report Type')
                          ->reactive(),

                      Select::make('committee_choice')
                          ->label('Committee Choice')
                          ->options([
                              'option_1' => 'Option 1',
                              'option_2' => 'Option 2',
                              'option_3' => 'Option 3',
                          ])
                          ->visible(fn(Forms\Get $get) => $get('report_type') === 'subcommittee')
                          ->required(),

                      TextInput::make('group_name')
                          ->label('Group Name')
                          ->visible(fn(Forms\Get $get) => $get('report_type') === 'group'),

                      TextInput::make('active_members')
                          ->label('Active Members')
                          ->numeric()
                          ->visible(fn(Forms\Get $get) => $get('report_type') === 'group'),
                  ]),

              Section::make('Fill out Report')
                  ->description('Please submit the report below by uploading your report or typing it in the report field.')
                  ->schema([
                      FileUpload::make('file_upload')
                          ->label('Upload Report File')
                          ->directory('reports')
                          ->disk('public')
                          ->nullable()
                          ->maxSize(2048)
                          ->acceptedFileTypes(['application/pdf', 'image/*'])
                          ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                            $currentDate = now()->format('Y-m-d');
                            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                            $userName = str_replace(' ', '-', Auth::user()->name);
                            $extension = $file->getClientOriginalExtension();
                            return "{$currentDate}_{$originalName}_{$userName}.{$extension}";
                          }),

                      RichEditor::make('report_text')
                          ->label('Report Text')
                          ->nullable(),
                  ])
          ])
          ->statePath('data')
          ->model(Report::class);
    }

    public function create(): void
    {
      // Mutate the form data before creating the report
      $data = $this->mutateFormDataBeforeCreate($this->form->getState());

      // Create the report
      $record = Report::create($data);

      // Handle related data after creating the report
      $this->afterCreate($record);

      // Save relationships
      $this->form->model($record)->saveRelationships();

      // Show a success notification
      Notification::make()
          ->title('Report Submitted')
          ->body('The report has been submitted successfully.')
          ->success()
          ->send();

      // Clear the form after submission
      $this->form->fill([]);

//      // Optionally, reset the $data property to empty after submission
//      $this->reset('data');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
      // Set user_id and submitted_by
      $data['user_id'] = 1;
//      $data['submitted_by'] = Auth::user()->name;
      $data['date_submitted'] = $data['date_submitted'] ?? now();

      // Handle subcommittee or group specific fields
      $relatedData = [];
      if ($data['report_type'] === 'subcommittee') {
        $relatedData = [
            'committee_choice' => $data['committee_choice'],
        ];
      } elseif ($data['report_type'] === 'group') {
        $relatedData = [
            'group_name' => $data['group_name'],
            'active_members' => $data['active_members'],
        ];
      }

      // Remove the related fields from the main data
      unset($data['committee_choice'], $data['group_name'], $data['active_members']);

      return $data;
    }

    protected function afterCreate($report): void
    {
      // Save the related data after creating the report
      if ($report->report_type === 'subcommittee') {
        SubCommitteeReport::create([
            'report_id' => $report->id,
            'committee_choice' => $this->data['committee_choice'],
        ]);
      } elseif ($report->report_type === 'group') {
        GroupReport::create([
            'report_id' => $report->id,
            'group_name' => $this->data['group_name'],
            'active_members' => $this->data['active_members'],
        ]);
      }
    }

    public function render(): View
    {
      return view('livewire.report-form');
    }
  }
