<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class Jumbotron extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('jumbotron')
            ->schema([
                //
                TextInput::make('title'),
                Textarea::make('subheading'),
                FileUpload::make('image')->maxSize(2048)
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
}
