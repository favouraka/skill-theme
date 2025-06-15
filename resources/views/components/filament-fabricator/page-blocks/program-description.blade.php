@props(['image', 'title', 'description'])

<section class="p-4 lg:p-8 ">
    <div class="max-w-5xl bg-white mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 rounded-md shadow-sm border-gray-100">
        {{-- image --}}
        <div class="col-span-1 h-full">
            <img src="{{ asset('/storage/'.$image) }}" alt="Descriptive Alt Text" class="object-cover w-full h-full">
        </div>
        {{-- text and description div --}}
        <div class="lg:col-span-2 p-6">
            <h3 class="text-2xl font-bold mb-4">{{ $title }}</h3>
            <p class="text-lg">
                {{ $description }}
            </p>
        </div>
    </div>
</section>
