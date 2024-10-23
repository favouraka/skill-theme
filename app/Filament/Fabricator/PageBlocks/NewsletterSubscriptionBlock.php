<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class NewsletterSubscriptionBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('newsletter-subscription')
            ->schema([
                TextInput::make('title')
                    ->label('Title')
                    ->default('Subscribe to our Newsletter')
                    ->required(),
                TextInput::make('subtitle')
                    ->label('Subtitle')
                    ->default('Stay updated with our latest news and updates')
                    ->required(),
            ]);
    }

    public static function getBlockLabel(): string
    {
        return 'Newsletter Subscription';
    }
}
