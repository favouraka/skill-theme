<div>
    <h1>All Events</h1>
    <ul>
        @foreach($events as $event)
            <li>
                <a href="{{ route('events.show', $event) }}">{{ $event->title }}</a>
                ({{ $event->start_date->format('Y-m-d') }})
            </li>
        @endforeach
    </ul>
</div>
