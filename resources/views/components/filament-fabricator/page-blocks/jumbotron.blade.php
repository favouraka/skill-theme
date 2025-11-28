@aware(['page'])
<div class="relative w-full bg-gradient-to-r from-primary to-secondary overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="absolute inset-0 bg-cover bg-center mix-blend-multiply" style="background-image: url('{{ asset('storage/'.$image) }}');"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 py-16 sm:px-6 sm:py-24 lg:py-32">
        @if(isset($hero_image))
        <!-- Two column layout when hero image is present -->
        <div class="flex flex-col lg:flex-row items-center justify-between">
            <div class="lg:w-1/2 lg:pr-8">
                <h1 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl lg:text-5xl drop-shadow-md">
                    {{  $title ?? $page->title ?? 'Welcome' }}
                </h1>
                <p class="mt-6 max-w-3xl text-lg text-white drop-shadow-md">
                    {{ $subheading ?? 'Default description text goes here. You can customize this based on your needs.' }}
                </p>
            </div>
            
            <div class="lg:w-1/2 lg:pl-8 mt-8 lg:mt-0 flex items-end justify-center lg:justify-end">
                <div class="w-48 h-48 sm:w-64 sm:h-64 lg:w-80 lg:h-80 rounded-lg overflow-hidden shadow-2xl">
                    <img src="{{ asset('storage/'.$hero_image) }}" alt="Hero Image" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
        @else
        <!-- Single column layout when no hero image -->
        <div>
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl drop-shadow-md">
                {{  $title ?? $page->title ?? 'Welcome' }}
            </h1>
            <p class="mt-6 max-w-3xl text-xl text-white drop-shadow-md">
                {{ $subheading ?? 'Default description text goes here. You can customize this based on your needs.' }}
            </p>
        </div>
        @endif
    </div>
</div>
