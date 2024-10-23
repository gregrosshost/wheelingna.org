<?php

namespace App\Models\Reports;

use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;
use Filament\Forms;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class Report extends Model
{
   protected $fillable = ['user_id', 'report_type', 'date_submitted', 'submitted_by', 'report_text', 'file_upload'];

   public static function getForm(): array
   {
      return [
          Section::make('Submit Report')
              ->description('Please choose secretary, subcommittee, or group report below.')
              ->schema([
                // Automatically populate the "Submitted By" field with the authenticated user's name
                  TextInput::make('submitted_by')
                      ->label('Submitted By')
                      ->default(fn() => Auth::user()->name)  // Automatically set the current user's name
                      ->disabled(),  // Disable the field to make it read-only

                // Date of submission (can be automatically set to today's date if needed)
                  DatePicker::make('date_submitted')
                      ->label('Date Submitted')
                      ->default(now())  // Default to today's date
                      ->disabled(),

                // Alternatively, you can hide it with ->hidden() if you don't want it visible
                // Select for Report Type
                  Select::make('report_type')
                      ->options([
                          'secretary' => 'Secretary Report',
                          'subcommittee' => 'Sub-committee Report',
                          'group' => 'Group Report',
                      ])
                      ->required()
                      ->label('Report Type')
                      ->reactive(),  // Add reactive() to make the field update in real-time


                // Conditional fields for Sub-committee Report
                  Select::make('committee_choice')
                      ->label('Committee Choice')
                      ->options([
                          'option_1' => 'Option 1',
                          'option_2' => 'Option 2',
                          'option_3' => 'Option 3',
                        // Add all 12 options here
                      ])
                      ->visible(fn(Forms\Get $get) => $get('report_type') === 'subcommittee')
                      ->required(),

                // Conditional fields for Group Report
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

                // File upload field
                  FileUpload::make('file_upload')
                      ->label('Upload Report File')
                      ->directory('reports')  // Optional: specify directory in storage
                      ->disk('public')        // Use the 'public' disk
                      ->nullable()            // Allow null if the upload is optional
                      ->maxSize(2048)         // Set max file size in kilobytes (2 MB)
                      ->acceptedFileTypes(['application/pdf', 'image/*'])  // Limit accepted file types
                      ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        $currentDate = now()->format('Y-m-d');
                        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                        $userName = str_replace(' ', '-', Auth::user()->name); // Replace spaces with underscores
                        $extension = $file->getClientOriginalExtension();

                        return "{$currentDate}_{$originalName}_{$userName}.{$extension}";
                      }),


                  RichEditor::make('report_text')
                      ->label('Report Text')
                      ->nullable(),
              ])
      ];
   }

    public function user(): BelongsTo
    {
      return $this->belongsTo(User::class);
    }


  public function subCommitteeReport(): HasOne
  {
    return $this->hasOne(SubCommitteeReport::class, 'report_id');
  }

  public function groupReport(): HasOne
  {
    return $this->hasOne(GroupReport::class, 'report_id');
  }

  // Accessor for committee_choice for Sub-committee reports
  public function getCommitteeChoiceAttribute()
  {
    return $this->report_type === 'subcommittee'
        ? $this->subCommitteeReport?->committee_choice
        : null;
  }

  // Accessor for group_name for Group reports
  public function getGroupNameAttribute()
  {
    return $this->report_type === 'group'
        ? $this->groupReport?->group_name
        : null;
  }

  // Accessor for active_members for Group reports
  public function getActiveMembersAttribute()
  {
    return $this->report_type === 'group'
        ? $this->groupReport?->active_members
        : null;
  }
}
