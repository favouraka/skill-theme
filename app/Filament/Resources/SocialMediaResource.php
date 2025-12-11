<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocialMediaResource\Pages;
use App\Models\SocialMedia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SocialMediaResource extends Resource
{
    protected static ?string $model = SocialMedia::class;

    protected static ?string $navigationIcon = 'heroicon-o-share';

    protected static ?string $navigationGroup = 'Site Management';

    protected static ?string $navigationLabel = 'Social Media';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        $platformOptions = collect(config('social-media.platforms'))
            ->mapWithKeys(function ($platform, $key) {
                return [$key => $platform['name']];
            })
            ->toArray();

        return $form
            ->schema([
                Forms\Components\Select::make('platform')
                    ->label('Platform')
                    ->options($platformOptions)
                    ->required()
                    ->searchable()
                    ->helperText('Select the social media platform'),
                Forms\Components\TextInput::make('url')
                    ->label('URL')
                    ->url()
                    ->maxLength(255)
                    ->required()
                    ->helperText('Enter the full URL including https://'),
                Forms\Components\Toggle::make('is_active')
                    ->label('Active')
                    ->default(true)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('platform')
                    ->searchable(),
                Tables\Columns\TextColumn::make('url')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListSocialMedia::route('/'),
            'create' => Pages\CreateSocialMedia::route('/create'),
            'edit' => Pages\EditSocialMedia::route('/{record}/edit'),
        ];
    }
}