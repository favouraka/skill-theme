<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class NewsletterBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('newsletter')
            ->schema([
                \Filament\Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->required(),
                \Filament\Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->required(),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }

    public static function getView(): string
    {
        return 'components.filament-fabricator.page-blocks.newsletter';
    }
}
