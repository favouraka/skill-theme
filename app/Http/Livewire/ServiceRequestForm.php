<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Hidden;
use App\Models\FormResponse;

class ServiceRequestForm extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $name;
    public $email;
    public $message;
    public $serviceRequested;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->email()->required(),
                Textarea::make('message')->nullable(),
                Hidden::make('serviceRequested')->default($this->serviceRequested),
            ])
            ->statePath('formData');
    }


    public function submit()
    {
        $data = $this->form->getState();
        dd($data);
        FormResponse::create($data);
        $this->dispatchBrowserEvent('notify', ['message' => 'Your request has been submitted!']);
        $this->reset('formData');
    }

    public function render()
    {
        return view('livewire.service-request-form');
    }
}
