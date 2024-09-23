
    <header class="bg-white shadow-md">
        <nav class="container mx-auto px-6 py-2">
            <div class="flex justify-between items-center">
                <a href="{{ route('index') }}" class="text-2xl font-bold text-primary">
                    <img src="{{ asset('img/main-logo.webp') }}" alt="SkillSport Logo" class="h-12 w-auto">
                </a>

                <div class="hidden md:flex space-x-6">
                    <a href="#" class="text-gray-700 hover:text-primary transition duration-300">About Us</a>
                    <a href="#" class="text-gray-700 hover:text-primary transition duration-300">Support Our Movement</a>
                    <a href="#" class="text-gray-700 hover:text-primary transition duration-300">Apply/Request for Services</a>
                    <a href="#" class="text-gray-700 hover:text-primary transition duration-300">Learn More</a>
                    <a href="#" class="text-gray-700 hover:text-primary transition duration-300">Events</a>
                </div>
                <button @click="mobileMenu = !mobileMenu" class="md:hidden focus:outline-none">
                    <svg class="h-6 w-6 fill-current text-gray-700" viewBox="0 0 24 24">
                        <path x-show="!mobileMenu" fill-rule="evenodd" clip-rule="evenodd" d="M4 6h16v2H4V6zm0 5h16v2H4v-2zm0 5h16v2H4v-2z"></path>
                        <path x-show="mobileMenu" fill-rule="evenodd" clip-rule="evenodd" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div x-show="mobileMenu" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="md:hidden mt-4 space-y-2">
                <a href="#" class="block text-gray-700 hover:text-primary transition duration-300">About Us</a>
                <a href="#" class="block text-gray-700 hover:text-primary transition duration-300">Support Our Movement</a>
                <a href="#" class="block text-gray-700 hover:text-primary transition duration-300">Apply/Request for Services</a>
                <a href="#" class="block text-gray-700 hover:text-primary transition duration-300">Learn More</a>
                <a href="#" class="block text-gray-700 hover:text-primary transition duration-300">Events</a>
            </div>
        </nav>
    </header>
