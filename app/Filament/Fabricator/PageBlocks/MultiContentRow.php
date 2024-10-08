<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class MultiContentRow extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('multi-content-row')
            ->schema([
                //
                TextInput::make('heading'),
                Textarea::make('subheading'),
                Checkbox::make('is_card'),
                Repeater::make('content')->schema([
                    TextInput::make('heading'),
                    TextInput::make('subheading'),
                    Textarea::make('content'),
                    TextInput::make('heroicon'),
                    FileUpload::make('image')->image()->imageResizeMode('cover')
                        ->imageResizeTargetWidth('1024')->imageResizeTargetHeight('1024')->imageCropAspectRatio('1:1'),
                ])
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
