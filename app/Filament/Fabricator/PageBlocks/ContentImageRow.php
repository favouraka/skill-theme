<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class ContentImageRow extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('content-image-row')
            ->schema([
                //
                TextInput::make('heading')->required(),
                Textarea::make('subheading')->maxLength(160),
                Select::make('align')->options(['left' => 'Left', 'right' => 'Right'])->default('left')->required(),
                RichEditor::make('body')->required(),
                FileUpload::make('images')->image()->maxFiles(3)
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('4:3')
                    ->imageResizeTargetWidth('1024')
                    ->imageResizeTargetHeight('768')
                ,
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
