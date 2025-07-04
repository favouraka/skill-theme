<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FormResponseResource\Pages;
use App\Models\FormResponse;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Form;
use Filament\Tables\Table;

class FormResponseResource extends Resource
{
    protected static ?string $model = FormResponse::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),
                Forms\Components\TextInput::make('form_phone')
                    ->nullable()
                    ->tel()
                    ->label('Phone (optional)'),
                Forms\Components\Textarea::make('message')
                    ->required(),
                Forms\Components\TextInput::make('service_requested')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('form_phone')
                    ->label('Phone (optional)'),
                Tables\Columns\TextColumn::make('message'),
                Tables\Columns\TextColumn::make('service_requested'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFormResponses::route('/'),
            'create' => Pages\CreateFormResponse::route('/create'),
            'edit' => Pages\EditFormResponse::route('/{record}/edit'),
        ];
    }
}
