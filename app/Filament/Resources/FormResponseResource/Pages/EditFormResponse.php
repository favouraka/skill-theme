<?php

namespace App\Filament\Resources\FormResponseResource\Pages;

use App\Filament\Resources\FormResponseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFormResponse extends EditRecord
{
    protected static string $resource = FormResponseResource::class;

    // protected function getActions(): array
    // {
    //     return [
    //         Actions\Action::make('Save')
    //             ->action('save')
    //             ->success('Form Response updated successfully!'),
    //     ];
    // }
}
