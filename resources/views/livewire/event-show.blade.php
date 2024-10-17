<div>
    <div>
        <h1>{{ $event->title }}</h1>
        <p>Start Date: {{ $event->start_date->format('Y-m-d H:i') }}</p>
        @if($event->end_date)
            <p>End Date: {{ $event->end_date->format('Y-m-d H:i') }}</p>
        @endif
        @if($event->location)
            <p>Location: {{ $event->location }}</p>
        @endif
        <p>{{ $event->description }}</p>
    </div>
    
    <div>
        <livewire:event-registration :event="$event" />
    </div>
    
    <div>
        <a href="{{ route('events.index') }}">Back to All Events</a>
    </div>
</div>
