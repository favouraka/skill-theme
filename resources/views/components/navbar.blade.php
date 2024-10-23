<header class="bg-white shadow-md">
        <nav class="container mx-auto px-6 py-2">
            <div class="flex justify-between items-center">
                <a href="{{ URL::to('/') }}" class="text-2xl font-bold text-primary">
                    <img src="{{ asset('img/main-logo.webp') }}" alt="SkillSport Logo" class="h-12 w-auto">
                </a>

                <div class="hidden lg:flex space-x-6 text-sm">
                    <a href="{{ URL::to('about') }}" class="text-gray-700 hover:text-primary transition duration-300">About Us</a>
                    <a href="{{ URL::to('support-our-movement') }}" class="text-gray-700 hover:text-primary transition duration-300">Support Our Movement</a>
                    <a href="{{ URL::to('applyrequest-for-services') }}" class="text-gray-700 hover:text-primary transition duration-300">Apply/Request for Services</a>
                    <a href="{{ URL::to('learn-more') }}" class="text-gray-700 hover:text-primary transition duration-300">Learn More</a>
                    <a href="{{ URL::to('events') }}" class="text-gray-700 hover:text-primary transition duration-300">Events</a>
                    <a href="{{ URL::to('blog') }}" class="text-gray-700 hover:text-primary transition duration-300">Blog</a>
                </div>
                <button @click="mobileMenu = !mobileMenu" class="lg:hidden focus:outline-none">
                    <svg class="h-6 w-6 fill-current text-gray-700" viewBox="0 0 24 24">
                        <path x-show="!mobileMenu" fill-rule="evenodd" clip-rule="evenodd" d="M4 6h16v2H4V6zm0 5h16v2H4v-2zm0 5h16v2H4v-2z"></path>
                        <path x-show="mobileMenu" fill-rule="evenodd" clip-rule="evenodd" d="M6 18L18 6M6 6l12 12" stroke="black" stroke-width="2"></path>
                    </svg>
                </button>
            </div>
            <div x-show="mobileMenu" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="lg:hidden mt-4 space-y-2">
                <a href="{{ URL::to('about') }}" class="block text-gray-700 hover:text-primary transition duration-300">About Us</a>
                <a href="{{ URL::to('support-our-movement') }}" class="block text-gray-700 hover:text-primary transition duration-300">Support Our Movement</a>
                <a href="{{ URL::to('applyrequest-for-services') }}" class="block text-gray-700 hover:text-primary transition duration-300">Apply/Request for Services</a>
                <a href="{{ URL::to('learn-more') }}" class="block text-gray-700 hover:text-primary transition duration-300">Learn More</a>
                <a href="{{ URL::to('events') }}" class="block text-gray-700 hover:text-primary transition duration-300">Events</a>
                <a href="{{ URL::to('blog') }}" class="block text-gray-700 hover:text-primary transition duration-300">Blog</a>
            </div>
        </nav>
    </header>
