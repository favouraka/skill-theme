@props(['title', 'features'])

<section class="py-20">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">{{ $title }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($features as $item)
                <x-key-features>
                    <x-slot name="title"> {{ $item['title'] }} </x-slot>
                    <x-slot name="icon">
                        @svg($item['icon'], 'h-24 w-24 text-tertiary')
                    </x-slot>
                    <p>{{ $item['body'] }}</p>
                </x-key-features>
            @endforeach
        </div>
    </div>
</section>
