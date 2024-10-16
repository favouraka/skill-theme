<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;

class EventShow extends Component
{
    public Event $event;

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function render()
    {
        return view('livewire.event-show');
    }
}
