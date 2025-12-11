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
                                \Filament\Forms\Components\Repeater::make('services')
                                    ->label('Services')
                                    ->schema([
                                        \Filament\Forms\Components\TextInput::make('name')
                                            ->label('Service Name')
                                            ->required(),
                                    ])
                                    ->collapsible()
                                    ->addActionLabel('Add Service')
                                    ->minItems(0)
                                    ->maxItems(10),
            ]);
    }

    public static function mutateData(array $data): array
    {
        // Ensure services is always an array, even if empty
        $data['services'] = $data['services'] ?? [];

        return $data;
    }
}