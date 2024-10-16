<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use App\Models\NewsletterSubscriber;

class EventRegistration extends Component
{
    public $event;
    public $email;

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function register()
    {
        $this->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email'
        ]);

        NewsletterSubscriber::create([
            'email' => $this->email,
            'event_id' => $this->event->id
        ]);

        session()->flash('message', 'You have successfully registered for this event!');
        $this->email = '';
    }

    public function render()
    {
        return view('livewire.event-registration');
    }
}
