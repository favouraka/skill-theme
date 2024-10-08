@aware(['page'])
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
                <div class="bg-white/80 border border-gray-200 rounded-lg shadow-sm p-6 hover:bg-white hover:shadow-lg focus:shadow-md focus:bg-blue-50">
                    @if ($item['heroicon'])
                       @svg('heroicon-o-'.$item['heroicon'], 'size-32 px-0 p-4 text-primary')

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
                </div>
            @endforeach
        </div>
    </div>
</div>
