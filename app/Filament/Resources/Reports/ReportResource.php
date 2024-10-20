<?php

  namespace App\Filament\Resources\Reports;

  use App\Filament\Resources\Reports\ReportResource\Pages;
  use App\Filament\Resources\Reports\ReportResource\RelationManagers;
  use App\Models\Reports\Report;
  use Filament\Forms;
  use Filament\Forms\Form;
  use Filament\Resources\Resource;
  use Filament\Tables;
  use Filament\Tables\Table;
  use Illuminate\Database\Eloquent\Builder;
  use Illuminate\Database\Eloquent\SoftDeletingScope;
  use Illuminate\Support\Facades\Auth;

  class ReportResource extends Resource
  {
    protected static ?string $model = Report::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
      return $form
          ->schema([
              Forms\Components\Section::make('Submit Report')
                  ->description('Please choose secretary, subcommittee, or group report below.')
                  ->schema([
                    // Automatically populate the "Submitted By" field with the authenticated user's name
                      Forms\Components\TextInput::make('submitted_by')
                          ->label('Submitted By')
                          ->default(fn () => Auth::user()->name)  // Automatically set the current user's name
                          ->disabled(),  // Disable the field to make it read-only

                    // Date of submission (can be automatically set to today's date if needed)
                      Forms\Components\DatePicker::make('date_submitted')
                          ->label('Date Submitted')
                          ->default(now())  // Default to today's date
                          ->disabled(),

                    // Alternatively, you can hide it with ->hidden() if you don't want it visible
                    // Select for Report Type
                      Forms\Components\Select::make('report_type')
                          ->options([
                              'secretary' => 'Secretary Report',
                              'subcommittee' => 'Sub-committee Report',
                              'group' => 'Group Report',
                          ])
                          ->required()
                          ->label('Report Type')
                          ->reactive(),  // Add reactive() to make the field update in real-time



                    // Conditional fields for Sub-committee Report
                      Forms\Components\Select::make('committee_choice')
                          ->label('Committee Choice')
                          ->options([
                              'option_1' => 'Option 1',
                              'option_2' => 'Option 2',
                              'option_3' => 'Option 3',
                            // Add all 12 options here
                          ])
                          ->visible(fn(Forms\Get $get) => $get('report_type') === 'subcommittee'),

                    // Conditional fields for Group Report
                      Forms\Components\TextInput::make('group_name')
                          ->label('Group Name')
                          ->visible(fn(Forms\Get $get) => $get('report_type') === 'group'),

                      Forms\Components\TextInput::make('active_members')
                          ->label('Active Members')
                          ->numeric()
                          ->visible(fn(Forms\Get $get) => $get('report_type') === 'group'),
                  ]),

              Forms\Components\Section::make('Fill out Report')
                  ->description('Please submit the report below by uploading your report or typing it in the report field.')
                  ->schema([

                      Forms\Components\FileUpload::make('file_upload')
                          ->label('Report File Upload')
                          ->nullable(),

                      Forms\Components\RichEditor::make('report_text')
                          ->label('Report Text')
                          ->nullable(),
                  ])






          ]);
    }

    public static function table(Table $table): Table
    {
      return $table
          ->columns([
            // Date Submitted
              Tables\Columns\TextColumn::make('date_submitted')
                  ->label('Date Submitted')
                  ->sortable()
                  ->date(),

            // Submitted By
              Tables\Columns\TextColumn::make('submitted_by')
                  ->label('Submitted By')
                  ->searchable()
                  ->sortable(),

            // Report Type
              Tables\Columns\TextColumn::make('report_type')
                  ->label('Report Type')
                  ->sortable()
                  ->formatStateUsing(fn ($state) => match ($state) {
                    'secretary' => 'Secretary Report',
                    'subcommittee' => 'Sub-committee Report',
                    'group' => 'Group Report',
                    default => 'Unknown',
                  }),
          ])
          ->filters([
            Tables\Filters\SelectFilter::make('report_type')
                ->options([
                    'secretary' => 'Secretary Report',
                    'subcommittee' => 'Sub-committee Report',
                    'group' => 'Group Report',
                ])
                ->label('Report Type'),
          ])
          ->actions([
              Tables\Actions\EditAction::make(),
              Tables\Actions\ViewAction::make(),
          ])
          ->bulkActions([
              Tables\Actions\DeleteBulkAction::make(),
          ]);
    }









    public static function getRelations(): array
    {
      return [
        //
      ];
    }

    public static function getPages(): array
    {
      return [
          'index' => Pages\ListReports::route('/'),
          'create' => Pages\CreateReport::route('/create'),
          'edit' => Pages\EditReport::route('/{record}/edit'),
      ];
    }
  }
