<?php

namespace App\Livewire;

use App\Mail\FormSubmissionNotification;
use App\Models\FormResponse;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ImageTextBlockForm extends Component
{
    public $form_name = '';
    public $form_email = '';
    public $form_message = '';
    public $service_name = '';

    protected $rules = [
        'form_name' => 'required|min:2',
        'form_email' => 'required|email',
        'form_message' => 'nullable',
    ];

    public function mount($heading)
    {
        $this->service_name = $heading;
    }

    public function submit()
    {
        $this->validate();

        $formResponse = FormResponse::create([
            'name' => $this->form_name,
            'email' => $this->form_email,
            'message' => $this->form_message,
            'service_requested' => $this->service_name,
        ]);

        // Dispatch queued email notification
        $adminEmail = config('mail.from.address', 'admin@skillsport.org');
        Mail::to($adminEmail)->queue(new FormSubmissionNotification($formResponse));

        $this->reset(['form_name', 'form_email', 'form_message']);
        $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.image-text-block-form');
    }
}
