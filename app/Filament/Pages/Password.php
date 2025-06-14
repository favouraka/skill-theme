<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;


class Password extends Page implements HasForms,  HasActions
{
    use InteractsWithForms, InteractsWithActions;

    protected static ?string $navigationIcon = 'heroicon-o-key';

    protected static string $view = 'filament.pages.password';

    protected static ?string $navigationGroup = 'Settings';
    protected static ?int $navigationSort = 3;

    public ?array $data = [];

    public function form(Form $form): Form
    {
        //
        return $form->schema([
                TextInput::make('current_password')
                    ->password()
                    ->revealable()
                    ->required(),
                TextInput::make('new_password')
                    ->required()
                    ->revealable()
                    ->password()
                    ->confirmed()
                    ->columnStart(1),
                TextInput::make('new_password_confirmation')
                    ->password()
                    ->revealable()
                    ->required(),                       
                ])->columns(2)->statePath('data');
    }

    public function saveAction(): Action
    {
        return Action::make('save')
            ->label('Change Password')
            // ->requiresConfirmation()
            ->action(fn () => $this->updateUserPassword());
    }

    private function updateUserPassword()
    {
        // 
        $validated = ($this->form->getState());

        if (Hash::check($validated['current_password'], auth()->user()->password)) {
            // Password matches
            // Add your logic here
            auth()->user()->update([
                'password' => Hash::make($validated['new_password'])
            ]);
            // success notification
            Notification::make()->title('Password Updated')->success()->send();
        } else {
            // Password does not match
            // Add your logic here
            Notification::make()->title('Password Update Failed! Current password does not match')->danger()->send();           
        }
    }
}