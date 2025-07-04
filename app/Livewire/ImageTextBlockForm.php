<?php

namespace App\Livewire;

use App\Models\FormResponse;
use Livewire\Component;

class ImageTextBlockForm extends Component
{
    public $form_name = '';
    public $form_email = '';
    public $form_message = '';
    public $form_phone = ''; // Assuming phone is not part of the form, but included for completeness
    public $service_name = '';

    protected $rules = [
        'form_name' => 'required|min:2',
        'form_email' => 'required|email',
        'form_phone' => 'nullable|regex:/^(\+?\d{1,3}[- ]?)?\d{10}$/', // Optional phone number validation
        'form_message' => 'nullable',
    ];

    public function mount($heading)
    {
        $this->service_name = $heading;
    }

    public function submit()
    {
        $this->validate();

        FormResponse::create([
            'name' => $this->form_name,
            'email' => $this->form_email,
            'phone' => $this->form_phone, // Assuming phone is not part of the form
            'message' => $this->form_message,
            'service_requested' => $this->service_name,
        ]);

        session()->flash('message', 'Your request has been submitted successfully!');   
        // Reset the form fields
        $this->reset(['form_name', 'form_email', 'form_message']);
        $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.image-text-block-form');
    }
}
