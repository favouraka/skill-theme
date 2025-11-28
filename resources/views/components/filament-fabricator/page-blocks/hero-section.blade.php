@props(['title', 'description', 'primary_button_text', 'primary_button_url', 'secondary_button_text', 'secondary_button_url', 'background_image' => null, 'hero_image' => null])


<section class="relative overflow-hidden bg-gradient-to-br from-primary via-secondary to-tertiary text-white py-20">
    @if($background_image)
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="absolute inset-0 bg-cover bg-center mix-blend-multiply" style="background-image: url('{{ asset('storage/'.$background_image) }}');"></div>
    @endif

    <div class="container mx-auto px-6 relative">
        @if(isset($hero_image))
        <!-- Two column layout when hero image is present -->
        <div class="flex flex-col lg:flex-row items-center justify-center lg:justify-between gap-8 lg:gap-4">
            <div class="lg:w-5/12 text-center lg:text-left">
                <h1 class="text-3xl font-bold mb-6 sm:text-4xl lg:text-5xl" x-data x-intersect="$el.classList.add('animate-fade-in-up')">{{ $title }}</h1>
                <p class="text-lg mb-8" x-data x-intersect="$el.classList.add('animate-fade-in-up', 'animate-delay-200')">{{ $description }}</p>
                <div class="space-y-2 lg:text-left">
                    <a href="{{ URL::to($primary_button_url) ?? '#' }}" class="bg-white text-primary inline-block font-semibold py-3 px-8 rounded-full hover:bg-opacity-90 transition duration-300" x-data x-intersect="$el.classList.add('animate-fade-in-up', 'animate-delay-400')">{{ $primary_button_text }}</a>
                    @if ($secondary_button_text)
                    <a href="{{ URL::to($secondary_button_url) ?? '#' }}" class="bg-primary text-white inline-block font-semibold py-3 px-8 rounded-full hover:bg-opacity-90 transition duration-300 ml-4" x-data x-intersect="$el.classList.add('animate-fade-in-up', 'animate-delay-400')">{{ $secondary_button_text }}</a>
                    @endif
                </div>
            </div>
            
            <div class="lg:w-6/12 mt-8 lg:mt-0 flex items-end justify-center">
                <div class="w-72 h-72 sm:w-80 sm:h-80 lg:w-96 lg:h-96 xl:w-[28rem] xl:h-[28rem] rounded-lg overflow-hidden shadow-2xl">
                    <img src="{{ asset('storage/'.$hero_image) }}" alt="Hero Image" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
        @else
        <!-- Single column layout when no hero image -->
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6" x-data x-intersect="$el.classList.add('animate-fade-in-up')">{{ $title }}</h1>
            <p class="text-xl mb-8" x-data x-intersect="$el.classList.add('animate-fade-in-up', 'animate-delay-200')">{{ $description }}</p>
            <div class="space-y-2">
                <a href="{{ URL::to($primary_button_url) ?? '#' }}" class="bg-white text-primary inline-block font-semibold py-3 px-8 rounded-full hover:bg-opacity-90 transition duration-300" x-data x-intersect="$el.classList.add('animate-fade-in-up', 'animate-delay-400')">{{ $primary_button_text }}</a>
                @if ($secondary_button_text)
                <a href="{{ URL::to($secondary_button_url) ?? '#' }}" class="bg-primary text-white inline-block font-semibold py-3 px-8 rounded-full hover:bg-opacity-90 transition duration-300 ml-4" x-data x-intersect="$el.classList.add('animate-fade-in-up', 'animate-delay-400')">{{ $secondary_button_text }}</a>
                @endif
            </div>
        </div>
        @endif
    </div>
</section>
