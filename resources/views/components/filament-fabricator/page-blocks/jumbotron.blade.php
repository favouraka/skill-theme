@aware(['page'])
<div class="relative w-full bg-gradient-to-r from-primary to-secondary overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="absolute inset-0 bg-cover bg-center mix-blend-multiply" style="background-image: url('{{ asset('storage/'.$image) }}');"></div>
    <div class="relative max-w-5xl mx-auto px-4 py-16 sm:px-6 sm:py-24 lg:py-32">
        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl drop-shadow-md">
            {{  $title ?? $page->title ?? 'Welcome' }}
        </h1>
        <p class="mt-6 max-w-3xl text-xl text-white drop-shadow-md">
            {{ $subheading ?? 'Default description text goes here. You can customize this based on your needs.' }}
        </p>
    </div>
</div>
