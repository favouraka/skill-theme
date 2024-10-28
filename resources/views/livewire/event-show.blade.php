<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <x-breadcrumbs :items="[
            ['label' => 'Events', 'url' => route('events.index')],
            ['label' => $event->title]
        ]" />

        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="mb-6">
                <h1 class="text-3xl font-bold mb-4">{{ $event->title }}</h1>
                <p class="text-gray-600 mb-2"><span class="font-semibold">Start Date:</span> {{ $event->start_date->format('Y-m-d H:i') }}</p>
                @if($event->end_date)
                    <p class="text-gray-600 mb-2"><span class="font-semibold">End Date:</span> {{ $event->end_date->format('Y-m-d H:i') }}</p>
                @endif
                @if($event->location)
                    <p class="text-gray-600 mb-2"><span class="font-semibold">Location:</span> {{ $event->location }}</p>
                @endif
                <p class="text-gray-700 mt-4">{{ $event->description }}</p>
            </div>
            
            <div class="mb-6">
                <livewire:event-registration :event="$event" />
            </div>
            
            <div>
                <a href="{{ route('events.index') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300">Back to All Events</a>
            </div>
        </div>
    </div>
</div>
