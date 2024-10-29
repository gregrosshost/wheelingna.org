<?php

namespace App\Filament\Fabricator\PageBlocks;

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
                Section::make('Events')->schema([
                  RichEditor::make('event-content'),
                  TextInput::make('event-title'),
                  TextInput::make('event-date'),
                  TextInput::make('event-location'),
                  TextInput::make('event-flyer'),
                ])
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}