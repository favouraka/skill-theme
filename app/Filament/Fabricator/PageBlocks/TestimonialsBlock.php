<?php

namespace App\Filament\Fabricator\PageBlocks;

use Filament\Forms\Components\TextInput;
use Z3d0X\FilamentFabricator\PageBlocks\PageBlock;
use App\Models\Testimonials;
use Filament\Forms\Components\Builder\Block;

class TestimonialsBlock extends PageBlock
{
    public static function getBlockSchema(): Block
    {
        return Block::make('testimonials')
            ->schema([
                TextInput::make('heading')
                    ->label('Section Heading')
                    ->placeholder('Testimonials')
                    ->helperText('Leave empty to use default "Testimonials" text'),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return [
            ...parent::mutateData($data),
            'testimonials' => Testimonials::all(),
        ];
    }
}
