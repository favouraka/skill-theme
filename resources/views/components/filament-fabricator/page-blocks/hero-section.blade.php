@props(['title', 'description', 'primary_button_text', 'primary_button_url', 'secondary_button_text', 'secondary_button_url', 'background_image' => null])

<section class="bg-gradient-to-br from-primary via-secondary to-tertiary text-white py-20">
    @if($background_image)
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="absolute inset-0 bg-cover bg-center mix-blend-multiply" style="background-image: url('{{ asset('storage/'.$image) }}');"></div>
    @endif

    <div class="container mx-auto px-6">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6" x-data x-intersect="$el.classList.add('animate-fade-in-up')">{{ $title }}</h1>
            <p class="text-xl mb-8" x-data x-intersect="$el.classList.add('animate-fade-in-up', 'animate-delay-200')">{{ $description }}</p>
            <a href="{{ URL::to($primary_button_url) ?? '#' }}" class="bg-white text-primary font-semibold py-3 px-8 rounded-full hover:bg-opacity-90 transition duration-300" x-data x-intersect="$el.classList.add('animate-fade-in-up', 'animate-delay-400')">{{ $primary_button_text }}</a>
            @if ($secondary_button_text)
            <a href="{{ URL::to($secondary_button_url) ?? '#' }}" class="bg-primary text-white font-semibold py-3 px-8 rounded-full hover:bg-opacity-90 transition duration-300 ml-4" x-data x-intersect="$el.classList.add('animate-fade-in-up', 'animate-delay-400')">{{ $secondary_button_text }}</a>
            @endif
        </div>
    </div>
</section>
