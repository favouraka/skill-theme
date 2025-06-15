<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class HeroSectionBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('hero-section')
            ->schema([
                \Filament\Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->required(),
                \Filament\Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->required(),
                \Filament\Forms\Components\TextInput::make('button_text')
                    ->label('Button Text')
                    ->required(),
                \Filament\Forms\Components\TextInput::make('button_url')
                    ->label('Button URL')
                    ->required(),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }

    public static function getView(): string
    {
        return 'components.filament-fabricator.page-blocks.hero-section';
    }
}
