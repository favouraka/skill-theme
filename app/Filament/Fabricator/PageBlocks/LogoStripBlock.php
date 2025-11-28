<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;

class LogoStripBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('logo-strip')
            ->schema([
                TextInput::make('heading')
                    ->label('Heading')
                    ->placeholder('Our Partners')
                    ->helperText('Enter the main heading for the logo strip'),
                
                Textarea::make('subheading')
                    ->label('Subheading')
                    ->placeholder('Trusted by leading organizations worldwide')
                    ->rows(2)
                    ->helperText('Optional subheading to provide context'),
                
                Select::make('scroll_direction')
                    ->label('Scroll Direction')
                    ->options([
                        'left-to-right' => 'Left to Right',
                        'right-to-left' => 'Right to Left',
                    ])
                    ->default('left-to-right')
                    ->helperText('Direction of the infinite scroll animation'),
                
                Select::make('scroll_speed')
                    ->label('Scroll Speed')
                    ->options([
                        'slow' => 'Slow (30s)',
                        'normal' => 'Normal (20s)',
                        'fast' => 'Fast (10s)',
                    ])
                    ->default('normal')
                    ->helperText('Speed of the scrolling animation'),
                
                Toggle::make('pause_on_hover')
                    ->label('Pause on Hover')
                    ->default(true)
                    ->helperText('Pause the animation when users hover over logos'),
                
                Repeater::make('logos')
                    ->label('Logos')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Logo Image')
                            ->image()
                            ->imageEditor()
                            ->required()
                            ->helperText('Upload the logo image')
                            ->maxSize(2048),
                        
                        TextInput::make('url')
                            ->label('Link URL (Optional)')
                            ->url()
                            ->placeholder('https://example.com')
                            ->helperText('Optional link when logo is clicked'),
                        
                        TextInput::make('alt_text')
                            ->label('Alt Text')
                            ->placeholder('Company name')
                            ->helperText('Accessibility text for the logo')
                            ->required(),
                    ])
                    ->collapsible()
                    ->collapsed()
                    ->minItems(1)
                    ->helperText('Add at least one logo. Logos will be duplicated for seamless infinite scrolling.'),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return $data;
    }

    public static function getView(): string
    {
        return 'components.filament-fabricator.page-blocks.logo-strip';
    }
}