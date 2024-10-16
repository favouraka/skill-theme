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
    
    <h2>Register for this event</h2>
    <form wire:submit.prevent="register">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" wire:model="email" required>
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button type="submit">Register</button>
    </form>
    
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    
    <a href="{{ route('events.list') }}">Back to All Events</a>
</div>
