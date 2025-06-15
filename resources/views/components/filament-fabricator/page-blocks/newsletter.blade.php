@props(['title', 'description'])

<section class="bg-gradient-to-r from-primary to-tertiary py-20">
    <div class="container mx-auto px-6">
        <div class="max-w-3xl mx-auto text-center text-white">
            <h2 class="text-3xl font-bold mb-6" x-data x-intersect="$el.classList.add('animate-fade-in-up')">{{ $title }}</h2>
            <p class="mb-8" x-data x-intersect="$el.classList.add('animate-fade-in-up', 'animate-delay-200')">{{ $description }}</p>
            <form wire:submit.prevent="subscribeToNewsletter" class="flex flex-col md:flex-row justify-center items-center space-y-4 md:space-y-0 md:space-x-4" x-data x-intersect="$el.classList.add('animate-fade-in-up', 'animate-delay-400')">
                <input type="email" wire:model="email" placeholder="Enter your email" class="w-full md:w-auto px-4 py-2 rounded-full focus:outline-none focus:ring-2 focus:ring-white text-gray-800">
                <button type="submit" class="w-full md:w-auto bg-white text-primary font-semibold py-2 px-6 rounded-full hover:bg-opacity-90 transition duration-300">Subscribe</button>
            </form>
            @if (session()->has('message'))
                <div class="mt-4 text-green-200">
                    {{ session('message') }}
                </div>
            @endif
            @error('email') <span class="mt-2 text-red-200">{{ $message }}</span> @enderror
        </div>
    </div>
</section>
