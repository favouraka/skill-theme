<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class ImageTextBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('image-text-block')
            ->schema([
                FileUpload::make('image'),
                TextInput::make('heading')->required(),
                RichEditor::make('content')->required(),
                Checkbox::make('showButton')->label('Show request form')->default('false'),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
