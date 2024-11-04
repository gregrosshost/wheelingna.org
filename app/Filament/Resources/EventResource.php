<?php

  namespace App\Filament\Resources;

  use App\Filament\Resources\EventResource\Pages;
  use App\Models\Event;
  use Filament\Forms;
  use Filament\Forms\Form;
  use Filament\Resources\Resource;
  use Filament\Tables;
  use Filament\Tables\Table;
  use Illuminate\Support\Facades\Log;

  class EventResource extends Resource
  {
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
      return $form
          ->schema([
              Forms\Components\TextInput::make('title')
                  ->required()
                  ->maxLength(255),
              Forms\Components\Textarea::make('venue')
                  ->required()
                  ->columnSpanFull(),
              Forms\Components\TextInput::make('address')
                  ->required()
                  ->maxLength(255),
              Forms\Components\TextInput::make('city')
                  ->required()
                  ->maxLength(255),
              Forms\Components\TextInput::make('state')
                  ->required()
                  ->maxLength(255),
              Forms\Components\TextInput::make('zip')
                  ->required()
                  ->maxLength(255),
              Forms\Components\DateTimePicker::make('starts_at')
                  ->required(),
              Forms\Components\DateTimePicker::make('ends_at')
                  ->required(),
              Forms\Components\FileUpload::make('images'),
              Forms\Components\Repeater::make('volunteers')
                  ->schema([
                      Forms\Components\TextInput::make('name')
                          ->required(),
                      Forms\Components\TextInput::make('phone_number')
                          ->tel()
                          ->required(),
                      Forms\Components\TextInput::make('food_item')
                          ->required(),
                  ])
                  ->columnSpanFull()
          ]);
    }

    public static function table(Table $table): Table
    {
      return $table
          ->columns([
              Tables\Columns\TextColumn::make('title')
                  ->searchable(),
              Tables\Columns\TextColumn::make('address')
                  ->searchable(),
              Tables\Columns\TextColumn::make('city')
                  ->searchable(),
              Tables\Columns\TextColumn::make('state')
                  ->searchable(),
              Tables\Columns\TextColumn::make('zip')
                  ->searchable(),
              Tables\Columns\TextColumn::make('starts_at')
                  ->dateTime()
                  ->sortable(),
              Tables\Columns\TextColumn::make('ends_at')
                  ->dateTime()
                  ->sortable(),
//              Tables\Columns\TextColumn::make('volunteers')
//                  ->formatStateUsing(function ($state) {
//                    dd($state); // This will show us exactly what's coming in
//                    return '0 volunteers';
//                  }),
              Tables\Columns\TextColumn::make('created_at')
                  ->dateTime()
                  ->sortable()
                  ->toggleable(isToggledHiddenByDefault: true),
              Tables\Columns\TextColumn::make('updated_at')
                  ->dateTime()
                  ->sortable()
                  ->toggleable(isToggledHiddenByDefault: true),
          ])
          ->filters([
            //
          ])
          ->actions([
              Tables\Actions\EditAction::make(),
          ])
          ->bulkActions([
              Tables\Actions\BulkActionGroup::make([
                  Tables\Actions\DeleteBulkAction::make(),
              ]),
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
          'index' => Pages\ListEvents::route('/'),
          'create' => Pages\CreateEvent::route('/create'),
          'edit' => Pages\EditEvent::route('/{record}/edit'),
      ];
    }
  }