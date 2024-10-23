<div class="container mx-auto px-4 py-8">
    @if ($events->count())        
        <h1 class="text-3xl font-bold mb-8 text-center">All Events</h1>
    @endif
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($events as $event)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <img src="{{ $event->image_path }}" alt="{{ $event->title }}" class="mb-4 w-48 h-48 object-cover rounded-lg">
                    <h2 class="text-xl font-semibold mb-2">{{ $event->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ $event->start_date->format('F j, Y') }}</p>
                    <a href="{{ route('events.show', $event) }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300">
                        View Event
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full flex justify-center">
                <div class="bg-white rounded-lg shadow-md p-8 max-w-md w-full text-center">
                    <div class="flex justify-center mb-4">
                        <svg class="w-16 h-16 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">No Events Found</h3>
                    <p class="text-gray-600">No events are currently scheduled. Please check back later.</p>
                </div>
            </div>
        @endforelse
    </div>
</div>
