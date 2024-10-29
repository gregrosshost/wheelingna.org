<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class EventBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('event')
            ->schema([
                RichEditor::make('event-content'),
                TextInput::make('event-title'),
                TextInput::make('event-date'),
                TextInput::make('event-location'),
                TextInput::make('event-flyer'),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}