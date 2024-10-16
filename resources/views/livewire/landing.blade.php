<main>
    <section class="bg-gradient-to-br from-primary via-secondary to-tertiary text-white py-20">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6" x-data x-intersect="$el.classList.add('animate-fade-in-up')">Empowering Children for Brighter Futures</h1>
                <p class="text-xl mb-8" x-data x-intersect="$el.classList.add('animate-fade-in-up', 'animate-delay-200')">SkillSport is an empowerment program that helps children develop skills, confidence, and resources to take control of their lives and make informed decisions.</p>
                <a href="#" class="bg-white text-primary font-semibold py-3 px-8 rounded-full hover:bg-opacity-90 transition duration-300" x-data x-intersect="$el.classList.add('animate-fade-in-up', 'animate-delay-400')">Get Started</a>
            </div>
        </div>
    </section>

<section class="p-4 lg:p-8 ">
    <div class="max-w-5xl bg-white mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 rounded-md shadow-sm border-gray-100">
        {{-- image --}}
        <div class="col-span-1 h-full">
            <img src="{{ asset('img/blue-alt-logo.webp') }}" alt="Descriptive Alt Text" class="object-cover w-full h-full">
        </div>
        {{-- text and description div --}}
        <div class="lg:col-span-2 p-6">
                <h3 class="text-2xl font-bold mb-4">Program Description</h3>
                <p class="text-lg">
                    SkillSport uses a mobilization model, coupled with an on-site opportunity for
                    educational entities and districts, supplying resources and support at the student’s
                    disposal. Resources and support will include but not limited to the following: addressing
                    learning losses and preventing dropouts, particularly of marginalized groups, and
                    offering skills for college and career readiness programs. In addition, the program
                    provides a safe, nurturing environment that fosters growth, resilience, and stability.
                </p>
            </div>
    </div>
</section>
    <section class="py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Our Key Features</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($this->key_features as $item)
                    <x-key-features>
                            <x-slot name="title"> {{$item['title']}} </x-slot>
                            <x-slot name="icon">
                                @svg($item['icon'], 'h-24 w-24 text-tertiary')
                            </x-slot>
                        <p>{{$item['body']}}</p>
                    </x-key-features>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-gradient-to-r from-primary to-tertiary py-20">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl mx-auto text-center text-white">
                <h2 class="text-3xl font-bold mb-6" x-data x-intersect="$el.classList.add('animate-fade-in-up')">Join Our Newsletter</h2>
                <p class="mb-8" x-data x-intersect="$el.classList.add('animate-fade-in-up', 'animate-delay-200')">Stay updated with our latest programs, events, and success stories.</p>
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
</main>

