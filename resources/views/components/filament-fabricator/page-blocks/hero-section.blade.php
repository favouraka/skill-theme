@props(['title', 'description', 'button_text', 'button_url'])

<section class="bg-gradient-to-br from-primary via-secondary to-tertiary text-white py-20">
    <div class="container mx-auto px-6">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6" x-data x-intersect="$el.classList.add('animate-fade-in-up')">{{ $title }}</h1>
            <p class="text-xl mb-8" x-data x-intersect="$el.classList.add('animate-fade-in-up', 'animate-delay-200')">{{ $description }}</p>
            <a href="{{ $button_url }}" class="bg-white text-primary font-semibold py-3 px-8 rounded-full hover:bg-opacity-90 transition duration-300" x-data x-intersect="$el.classList.add('animate-fade-in-up', 'animate-delay-400')">{{ $button_text }}</a>
        </div>
    </div>
</section>
