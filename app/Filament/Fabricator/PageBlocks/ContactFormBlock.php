<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class ContactFormBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('contact-form')
            ->schema([
                //
                \Filament\Forms\Components\TextInput::make('heading')
                                    ->label('Heading')
                                    ->required(),
                                \Filament\Forms\Components\Textarea::make('description')
                                    ->label('Description'),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}