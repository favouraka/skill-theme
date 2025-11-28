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
                    \Filament\Forms\Components\Select::make('heroicon')
                        ->label('Icon')
                        ->options(function () {
                            // Get the cached icons manifest
                            $iconsManifest = include base_path('bootstrap/cache/blade-icons.php');
                            $heroicons = [];
                            
                            // Process outline icons (o-) as they are commonly used
                            if (isset($iconsManifest['heroicons'])) {
                                foreach ($iconsManifest['heroicons'] as $iconList) {
                                    foreach ($iconList as $icon) {
                                        // Only include outline icons for cleaner selection
                                        if (str_starts_with($icon, 'o-')) {
                                            $iconName = str_replace('o-', '', $icon);
                                            $displayName = ucwords(str_replace('-', ' ', $iconName));
                                            $heroicons[$icon] = $displayName;
                                        }
                                    }
                                }
                            }
                            
                            // Sort alphabetically by display name
                            asort($heroicons);
                            return $heroicons;
                        })
                        ->searchable()
                        ->getSearchResultsUsing(function (string $search) {
                            // Get the cached icons manifest
                            $iconsManifest = include base_path('bootstrap/cache/blade-icons.php');
                            $heroicons = [];
                            
                            if (isset($iconsManifest['heroicons'])) {
                                foreach ($iconsManifest['heroicons'] as $iconList) {
                                    foreach ($iconList as $icon) {
                                        if (str_starts_with($icon, 'o-')) {
                                            $iconName = str_replace('o-', '', $icon);
                                            $displayName = ucwords(str_replace('-', ' ', $iconName));
                                            
                                            // Check if search term matches icon name or display name
                                            if (str_contains($iconName, $search) || str_contains(strtolower($displayName), strtolower($search))) {
                                                $heroicons[$icon] = $displayName;
                                            }
                                        }
                                    }
                                }
                            }
                            
                            return $heroicons;
                        })
                        ->allowHtml()
                        ->formatStateUsing(fn ($state) => $state)
                        ->afterStateHydrated(function (\Filament\Forms\Components\Select $component, $state) {
                            if ($state) {
                                $component->extraAttributes([
                                    'data-icon' => $state,
                                ]);
                            }
                        })
                        ->extraAttributes([
                            'data-select-with-icon' => true,
                        ]),
                    FileUpload::make('image')->image()->imageResizeMode('cover')
                        ->imageResizeTargetWidth('1024')->imageResizeTargetHeight('1024')->imageCropAspectRatio('1:1'),
                        // add an button and button url for the repeated items
                    TextInput::make('button_text')->label('Button Text'),
                    TextInput::make('button_url')->label('Button URL'),
                ]),
                // collection resource button link
                TextInput::make('collection_button_label')->label('Collection Button Label'),
                TextInput::make('collection_button_url')->label('Collection Button URL'),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }
}
