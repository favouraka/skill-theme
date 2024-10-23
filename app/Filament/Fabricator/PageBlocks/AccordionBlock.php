<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class AccordionBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('accordion')
            ->schema([
                TextInput::make('heading')
                    ->label('Heading')
                    ->default('Frequently Asked Questions'),
                Repeater::make('items')
                    ->label('Accordion Items')
                    ->schema([
                        TextInput::make('title')
                            ->label('Title')
                            ->required(),
                        RichEditor::make('content')
                            ->label('Content')
                            ->required()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'strike',
                                'link',
                                'orderedList',
                                'unorderedList',
                                'redo',
                                'undo',
                            ]),
                    ])
                    ->collapsible()
                    ->defaultItems(1)
                    ->minItems(1)
            ]);
    }

    public static function getBlockLabel(): string
    {
        return 'Accordion';
    }
}
