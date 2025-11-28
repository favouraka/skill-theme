@aware(['page'])
@props(['heading' => 'Multi Content Row', 'subheading' => '', 'content' => [], 'collection_button_label' => null, 'collection_button_url' => null])

{{-- This component displays a row of cards with images and content. --}}
{{-- The image is optional and can be set to null if not needed. --}}
{{-- The heading and subheading are customizable. --}}
{{-- The content is an array of items, each containing a heading, subheading, and content text. --}}
<div class="px-4 py-4 md:py-8">
    <div class="max-w-5xl mx-auto flex flex-col">
        <h1 class="text-3xl font-bold mb-2  text-center">{{$heading}}</h1>
        <h2 class="text-xl text-gray-600 mb-6 text-center">{{$subheading}}</h2>
        <div @class([
                'grid grid-cols-1 gap-4',
                'md:grid-cols-2' => count($content) == 2,
                'md:grid-cols-3 ' => count($content) >= 3,
                ])>
            @foreach ($content as $item)
                <div class="bg-white/80 border border-gray-200 rounded-lg shadow-sm  hover:bg-white hover:shadow-lg focus:shadow-md focus:bg-blue-50">
                    {{-- card image --}}
                    @if (isset($item['image']))
                        <img src="{{ asset('storage/'.$item['image']) }}" alt="{{ $item['heading'] }}" class="w-full h-48 object-cover rounded-t-lg">
                    @endif
                    {{-- card content --}}
                    <div class="p-6">
                        @if ($item['heroicon'])
                        @svg('heroicon-'.$item['heroicon'], 'size-32 px-0 p-4 text-primary')

                        @endif
                        <div class="flex items-center mb-4">
                            <div>
                                <h3 class="text-xl font-semibold">{{ $item['heading'] }}</h3>
                                <p class="text-gray-600">{{ $item['subheading'] }}</p>
                            </div>
                        </div>
                        <div class="text-gray-700">
                            {{ $item['content'] ?? 'Card content goes here. This is a placeholder for the main content of the card.' }}
                        </div>
                        {{-- button --}}
                        @if (isset($item['button_text']) && isset($item['button_url']))
                            <div class="mt-4">
                                <a href="{{ $item['button_url'] }}" class="inline-block px-4 py-2 bg-primary text-white rounded hover:bg-primary transition-colors">
                                    {{ $item['button_text'] }}
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        {{-- view collection resources --}}
        @if (isset($collection_button_label))
            <div class="mt-8 flex justify-center">
            <a href="{{ url( $collection_button_url ) }}" class="inline-flex items-center px-6 py-3 text-lg font-bold text-primary border-2 border-primary rounded-full hover:bg-primary hover:text-white transition-colors">
                {{ $collection_button_label }}
                <svg class="w-6 h-6 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
            </div>
        @endif
    </div>
</div>
