<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class KeyFeaturesBlock extends PageBlock
{
    public static $additionalIcons = [
        'heroicon-o-academic-cap' => 'Academic Cap',
        'heroicon-o-adjustments' => 'Adjustments',
        'heroicon-o-archive' => 'Archive',
        'heroicon-o-arrow-circle-down' => 'Arrow Circle Down',
    ];

    public static function getBlockSchema(): Block
    {
        return Block::make('key-features')
            ->schema([
                \Filament\Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->required(),
                \Filament\Forms\Components\Repeater::make('features')
                    ->label('Features')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('title')
                            ->label('Title')
                            ->required(),
                        \Filament\Forms\Components\Select::make('icon')
                            ->label('Icon')
                            ->options(function () {
                                $landing = new \App\Livewire\Landing();
                                $icons = collect($landing->key_features)->mapWithKeys(function ($item) {
                                    $iconName = str_replace('heroicon-o-', '', $item['icon']);
                                    $iconName = str_replace('heroicon-s-', '', $iconName);
                                    $iconName = str_replace('-', ' ', $iconName);
                                    return [$item['icon'] => ucwords($iconName)];
                                })->toArray();
                                $additionalIcons = collect(self::$additionalIcons)->map(function ($label, $icon) {
                                    return ucwords(str_replace('-', ' ', str_replace('heroicon-o-', '', $icon)));
                                })->toArray();
                                return array_merge($icons, $additionalIcons);
                            })
                            ->required(),
                        \Filament\Forms\Components\Textarea::make('body')
                            ->label('Body')
                            ->required(),
                    ])
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }

    public static function getView(): string
    {
        return 'components.filament-fabricator.page-blocks.key-features';
    }
}
