<?php

  namespace App\Filament\Resources;

  use App\Filament\Components\ReportFormComponent;
  use App\Filament\Resources\ReportResource\Pages;
  use App\Filament\Resources\ReportResource\RelationManagers;
  use App\Models\Reports\Report;
  use Filament\Forms\Form;
  use Filament\Infolists\Components\TextEntry;
  use Filament\Infolists\Infolist;
  use Filament\Resources\Resource;
  use Filament\Tables;
  use Filament\Tables\Table;

  class ReportResource extends Resource
  {
    protected static ?string $model = Report::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
      return $form
          ->schema(
            Report::getForm(),
          );
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
          ])->defaultSort('date_submitted', 'desc')
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
              Tables\Actions\EditAction::make()
                  ->visible(fn ($record) => auth()->user()->id === $record->user_id),  // Only show if the user owns the report
              Tables\Actions\ViewAction::make(),
          ])
          ->bulkActions([
              Tables\Actions\DeleteBulkAction::make(),
          ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
      return $infolist
          ->schema([
            // Common Fields

              TextEntry::make('date_submitted')
                  ->label('Date Submitted'),

              TextEntry::make('report_type')
                  ->label('Report Type')
                  ->formatStateUsing(fn ($state) => match ($state) {
                    'secretary' => 'Secretary Report',
                    'subcommittee' => 'Sub-committee Report',
                    'group' => 'Group Report',
                    default => 'Unknown',
                  }),

              TextEntry::make('submitted_by')
                  ->label('Submitted By'),

            // Conditional Field: Committee Choice for Sub-committee Report
              TextEntry::make('subCommitteeReport.committee_choice')
                  ->label('Committee Choice')
                  ->visible(fn ($record) => $record->report_type === 'subcommittee'),

            // Conditional Field: Group Name for Group Report
              TextEntry::make('groupReport.group_name')
                  ->label('Group Name')
                  ->visible(fn ($record) => $record->report_type === 'group'),

            // Conditional Field: Active Members for Group Report
              TextEntry::make('groupReport.active_members')
                  ->label('Active Members')
                  ->visible(fn ($record) => $record->report_type === 'group'),

              TextEntry::make('report_text')
                  ->label('Report Text')
                  ->columnSpanFull(),

              TextEntry::make('file_upload')
                  ->label('Uploaded File')
                  ->url(fn ($record) => $record->file_upload ? config('app.url') . '/storage/' . $record->file_upload : null)
                  ->openUrlInNewTab()
                  ->visible(fn ($record) => !is_null($record->file_upload))  // Only show if a file is uploaded
                  ->extraAttributes([
                      'style' => 'color: blue; text-decoration: underline;',  // Change text color to blue and underline it
                      'class' => 'font-bold hover:text-indigo-600 transition',  // Add a bold font and hover effect
                  ])
                  ->columnSpanFull(),
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
          'index' => \App\Filament\Resources\ReportResource\Pages\ListReports::route('/'),
          'create' => \App\Filament\Resources\ReportResource\Pages\CreateReport::route('/create'),
          'edit' => \App\Filament\Resources\ReportResource\Pages\EditReport::route('/{record}/edit'),
      ];
    }
  }
