<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;

class EventList extends Component
{
    public function render()
    {
        return view('livewire.event-list', [
            'events' => Event::all()
        ]);
    }
}
