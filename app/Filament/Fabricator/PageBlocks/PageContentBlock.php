<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class PageContentBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('page-content')
            ->schema([
                RichEditor::make('content')
                    ->label('Content')
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
