<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Riodwanto\FilamentAceEditor\AceEditor;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class CodeBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('code')
            ->schema([
                AceEditor::make('tags')
                    ->mode('html')
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}