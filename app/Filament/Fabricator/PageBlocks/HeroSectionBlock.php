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
                \Filament\Forms\Components\TextInput::make('primary_button_text')
                    ->label('Primary Button Text'),
                \Filament\Forms\Components\TextInput::make('primary_button_url')
                    ->label('Primary Button URL'),
                \Filament\Forms\Components\TextInput::make('secondary_button_text')
                    ->label('Secondary Button Text'),
                \Filament\Forms\Components\TextInput::make('secondary_button_url')
                    ->label('Secondary Button URL'),
                \Filament\Forms\Components\FileUpload::make('background_image')->maxSize(2048)
                ->imageEditor()
                ->imageEditorAspectRatios([
                    '16:9',
                    '4:3',
                ]),
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
