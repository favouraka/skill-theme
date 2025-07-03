@aware(['page'])
@props([
    'heading' => '',
    'subheading' => '',
    'body' => '',
    'align' => 'left',
    'images' => collect(),
    'image' => null,
    'primary_button_label' => null,
    'primary_button_url' => null,
    'secondary_button_label' => null,
    'secondary_button_url' => null,
])

{{-- This is a content image row block with a heading, subheading, body text, and images. --}}
{{-- The images can be displayed in a row with the content on the left or right side. --}}
{{-- The block also supports primary and secondary buttons with labels and URLs. --}}
{{-- The images are displayed in a responsive grid layout. --}}
{{-- The block is designed to be used in a Filament Fabricator page. --}}
{{-- The images are stored in the storage folder and can be accessed via the asset() helper. --}}
{{-- The block is styled using Tailwind CSS classes for responsive design and spacing. --}}
{{-- The block is designed to be used in a Filament Fabricator page. --}}
{{-- The block supports both single and multiple images. --}}
{{-- The block is responsive and adjusts the layout based on the screen size. --}}
{{-- The block uses the aspect ratio of 4:3 for the images. --}}`
<div class="p-8 md:py-16">
    <div class="max-w-5xl mx-auto">
        <div class="grid grid-cols-1 {{ $images ? 'md:grid-cols-2 gap-8' : '' }}">
            <div class="space-y-4 ">
                <h2 class="text-5xl font-bold">{{$heading}}</h2>
                <h3 class="text-2xl font-semibold text-gray-600">{{$subheading}}</h3>
                <div class="prose text-gray-700 w-full">
                    {!! $body !!}
                </div>
                <!-- primary and secondary buttons labels and url as in the components -->
                @if ($primary_button_label && $primary_button_url)
                    <a href="{{$primary_button_url}}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        {{$primary_button_label}}
                    </a>
                @endif
                @if ($secondary_button_label && $secondary_button_url)
                    <a href="{{$secondary_button_url}}" class="inline-block bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                        {{$secondary_button_label}}
                    </a>
                @endif
            </div>
            @if (count($images) > 0)
                <div class="{{$images ? 'flex flex-col' : 'hidden'}} relative  {{$align == 'left' ? 'lg:order-last' : 'lg:order-first' }} p-4">
                    <div class="space-y-4 flex flex-col gap-4 relative m-auto">
                        @foreach ($images as $item)
                            <img src="{{asset('storage/'.$item)}}" alt="Image" class="aspect-4/3">
                        @endforeach
                    </div>
                </div>
            @elseif(count($images) == 0 && $image)
                <div class="{{$images ? 'flex flex-col' : 'hidden'}} relative  {{$align == 'left' ? 'lg:order-last' : 'lg:order-first' }} p-4">
                    <div class="space-y-4 flex flex-col gap-4 relative m-auto">
                        <img src="{{asset('storage/'.$image)}}" alt="Image" class="aspect-4/3">
                    </div>
                </div>
            @else
                <div class="hidden"></div>
            @endif
        </div>
    </div>
</div>
