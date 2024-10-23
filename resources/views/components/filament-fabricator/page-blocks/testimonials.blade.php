@props(['heading' => null, 'testimonials' => []])

<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">
            {{ $heading ?: 'Testimonials' }}
        </h2>

        <div class="relative">
            <div class="flex overflow-x-auto gap-6 pb-4 snap-x snap-mandatory scrollbar-hide">
                @foreach($testimonials as $testimonial)
                    <div class="snap-start flex-none w-full sm:w-[350px] bg-white rounded-lg shadow-lg p-6 transition-transform duration-300 hover:-translate-y-2 hover:shadow-xl">
                        <div class="flex flex-col items-center">
                            @if($testimonial->image)
                                <div class="w-20 h-20 rounded-full overflow-hidden mb-4">
                                    <img src="{{ $testimonial->image }}" alt="{{ $testimonial->name }}" class="w-full h-full object-cover">
                                </div>
                            @endif
                            
                            <div class="text-gray-600 text-center mb-4">
                                "{{ $testimonial->content }}"
                            </div>
                            
                            <div class="text-center">
                                <h4 class="font-semibold text-lg text-primary">{{ $testimonial->name }}</h4>
                                @if($testimonial->description)
                                    <p class="text-gray-500">{{ $testimonial->description }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
