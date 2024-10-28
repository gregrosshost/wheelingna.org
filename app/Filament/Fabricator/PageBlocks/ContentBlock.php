<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class ContentBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('content')
            ->schema([
                RichEditor::make('content')
                    ->label('Content')
                    ->extraAttributes(['class' => 'max-h-96'])
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
