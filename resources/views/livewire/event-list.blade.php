<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8 text-center">All Events</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($events as $event)
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
        @endforeach
    </div>
</div>
