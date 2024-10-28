<?php

namespace App\Filament\Fabricator\PageBlocks;

use App\Models\Reports\Report;
use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class FilamentFormBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('filament-form')
            ->schema([
                Report::getForm()
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}