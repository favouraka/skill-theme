<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;

class EventList extends Component
{
    public function render()
    {
        // Check if events are enabled
        if (!config('events.enabled', false)) {
            return view('livewire.event-list', [
                'events' => collect(),
                'eventsDisabled' => true
            ]);
        }

        return view('livewire.event-list', [
            'events' => Event::all(),
            'eventsDisabled' => false
        ]);
    }
}
