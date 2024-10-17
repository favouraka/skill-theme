<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Event;
use App\Models\Registration;

class EventRegistration extends Component
{
    public Event $event;
    public $name;
    public $email;

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function register()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        Registration::create([
            'event_id' => $this->event->id,
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $this->reset(['name', 'email']);

        session()->flash('message', 'You have successfully registered for this event.');
    }

    public function render()
    {
        return view('livewire.event-registration');
    }
}
