<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Riodwanto\FilamentAceEditor\AceEditor;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class CalculatorBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('calculator')
            ->schema([
//                AceEditor::make('htmlHead')->mode('html'),
//                AceEditor::make('htmlBody')->mode('html')
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}