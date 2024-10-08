@aware(['page'])
<div class="p-8 md:py-16">
    <div class="max-w-5xl mx-auto">
        <div class="grid grid-cols-1 {{ $images ? 'md:grid-cols-2 gap-8' : '' }}">
            <div class="space-y-4 ">
                <h2 class="text-5xl font-bold">{{$heading}}</h2>
                <h3 class="text-2xl font-semibold text-gray-600">{{$subheading}}</h3>
                <div class="prose text-gray-700 w-full">
                    {!! $body !!}
                </div>
            </div>
            @if ($images)
                <div class="{{$images ? 'flex flex-col' : 'hidden'}} relative  {{$align == 'left' ? 'lg:order-last' : 'lg:order-first' }} p-4">
                    <div class="space-y-4 flex flex-col gap-4 relative m-auto">
                        @foreach ($images as $item)
                            <img src="{{asset('storage/'.$item)}}" alt="Image" class="aspect-4/3">
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
