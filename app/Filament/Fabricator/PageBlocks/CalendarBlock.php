<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Models\Event;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class CalendarBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('calendar')
            ->schema([
                Section::make('Calendar')->schema([
                  RichEditor::make('calendar-content'),
                  TextInput::make('calendar')
                ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
      $data['events'] = Event::all();
      return $data;
    }
}