<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class LargeImageCardsBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('large-image-cards')
            ->schema([
                Repeater::make('cards')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Background Image')
                            ->image()
                            ->directory('card-images'),
                        Select::make('overlay_color')
                            ->options([
                                'primary' => 'Primary Theme Color',
                                'tertiary' => 'Tertiary Theme Color',
                            ])
                            ->required()
                            ->default('primary'),
                        TextInput::make('heading')
                            ->required()
                            ->maxLength(100),
                        RichEditor::make('content')
                            ->required(),
                    ])
                    ->defaultItems(3)
                    ->minItems(1)
                    ->maxItems(9)
                    ->columns(1)
                    ->collapsible()
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
