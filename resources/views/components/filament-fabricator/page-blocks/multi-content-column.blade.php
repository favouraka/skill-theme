@aware(['page'])
<div class="px-4 py-4 md:py-8">
    <div class="max-w-5xl mx-auto flex flex-col items-center">
        <h1 class="text-3xl font-bold text-center mb-2"> {{$heading}} </h1>
        <h2 class="text-xl text-gray-600 text-center mb-8"> {{$subheading}} </h2>

        <div class="flex flex-col w-full space-y-8">
            <!-- Row 1 -->
            @foreach ($content as $item)
                <div class="flex flex-col md:flex-row items-center p-8 bg-white/70 border rounded-lg">
                    <div class="md:w-2/3 pr-4 space-y-4">
                        <h1 class="text-2xl font-semibold">{{$item['heading']}}</h1>
                        <h3 class="text-lg font-light text-gray-600">{{$item['subheading']}}</h3>
                        <p>{{$item['content']}}</p>
                    </div>
                    <div class="md:w-1/3 mt-4 md:mt-0 flex flex-col justify-center items-center h-full">
                        @if ($item['image'])
                            <img src="{{asset('storage/'.$item['image'])}}" alt="Description of image 1" class="w-full h-auto rounded-lg shadow-md">
                        @else
                           <img src="{{ asset('img/blue-alt-logo.webp') }}" alt="Descriptive Alt Text" class="w-full my-auto rounded-md aspect-4/3">
                        @endif
                    </div>
                </div>
            @endforeach
            <!-- Add more rows as needed -->
        </div>
    </div>
</div>
