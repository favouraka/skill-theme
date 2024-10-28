<header class="bg-white shadow-md">
        <nav class="container mx-auto px-6 py-2" aria-label="Main navigation">
            <div class="flex justify-between items-center">
                <a href="{{ URL::to('/') }}" class="text-2xl font-bold text-primary">
                    <img src="{{ asset('img/main-logo.webp') }}" alt="SkillSport Logo" class="h-12 w-auto">
                </a>

                <div class="hidden lg:flex space-x-6 text-sm">
                    <a href="{{ URL::to('about') }}" 
                       class="text-gray-700 px-3 py-2 rounded-md {{ request()->is('about') ? 'bg-gray-100 text-primary font-bold' : 'hover:bg-gray-50' }} transition duration-300"
                       @if(request()->is('about')) aria-current="page" @endif>
                       About Us
                    </a>
                    <a href="{{ URL::to('support-our-movement') }}" 
                       class="text-gray-700 px-3 py-2 rounded-md {{ request()->is('support-our-movement') ? 'bg-gray-100 text-primary font-bold' : 'hover:bg-gray-50' }} transition duration-300"
                       @if(request()->is('support-our-movement')) aria-current="page" @endif>
                       Support Our Movement
                    </a>
                    <a href="{{ URL::to('applyrequest-for-services') }}" 
                       class="text-gray-700 px-3 py-2 rounded-md {{ request()->is('applyrequest-for-services') ? 'bg-gray-100 text-primary font-bold' : 'hover:bg-gray-50' }} transition duration-300"
                       @if(request()->is('applyrequest-for-services')) aria-current="page" @endif>
                       Apply/Request for Services
                    </a>
                    <a href="{{ URL::to('learn-more') }}" 
                       class="text-gray-700 px-3 py-2 rounded-md {{ request()->is('learn-more') ? 'bg-gray-100 text-primary font-bold' : 'hover:bg-gray-50' }} transition duration-300"
                       @if(request()->is('learn-more')) aria-current="page" @endif>
                       Learn More
                    </a>
                    <a href="{{ URL::to('events') }}" 
                       class="text-gray-700 px-3 py-2 rounded-md {{ request()->is('events') ? 'bg-gray-100 text-primary font-bold' : 'hover:bg-gray-50' }} transition duration-300"
                       @if(request()->is('events')) aria-current="page" @endif>
                       Events
                    </a>
                    <a href="{{ URL::to('blog') }}" 
                       class="text-gray-700 px-3 py-2 rounded-md {{ request()->is('blog') ? 'bg-gray-100 text-primary font-bold' : 'hover:bg-gray-50' }} transition duration-300"
                       @if(request()->is('blog')) aria-current="page" @endif>
                       Blog
                    </a>
                </div>
                <button @click="mobileMenu = !mobileMenu" 
                        class="lg:hidden focus:outline-none p-2 rounded-md hover:bg-gray-100 transition duration-300"
                        aria-expanded="false"
                        :aria-expanded="mobileMenu"
                        aria-controls="mobile-menu"
                        aria-label="Toggle navigation menu">
                    <svg class="h-6 w-6 fill-current text-gray-700" viewBox="0 0 24 24">
                        <path x-show="!mobileMenu" fill-rule="evenodd" clip-rule="evenodd" d="M4 6h16v2H4V6zm0 5h16v2H4v-2zm0 5h16v2H4v-2z"></path>
                        <path x-show="mobileMenu" fill-rule="evenodd" clip-rule="evenodd" d="M6 18L18 6M6 6l12 12" stroke="black" stroke-width="2"></path>
                    </svg>
                </button>
            </div>
            <div x-show="mobileMenu" 
                 x-transition:enter="transition ease-out duration-300" 
                 x-transition:enter-start="opacity-0 scale-95" 
                 x-transition:enter-end="opacity-100 scale-100" 
                 x-transition:leave="transition ease-in duration-200" 
                 x-transition:leave-start="opacity-100 scale-100" 
                 x-transition:leave-end="opacity-0 scale-95" 
                 class="lg:hidden mt-4 space-y-4 py-2"
                 id="mobile-menu">
                <a href="{{ URL::to('about') }}" 
                   class="block px-4 py-3 rounded-md {{ request()->is('about') ? 'bg-gray-100 text-primary font-bold' : 'text-gray-700 hover:bg-gray-50' }} transition duration-300"
                   @if(request()->is('about')) aria-current="page" @endif>
                   About Us
                </a>
                <a href="{{ URL::to('support-our-movement') }}" 
                   class="block px-4 py-3 rounded-md {{ request()->is('support-our-movement') ? 'bg-gray-100 text-primary font-bold' : 'text-gray-700 hover:bg-gray-50' }} transition duration-300"
                   @if(request()->is('support-our-movement')) aria-current="page" @endif>
                   Support Our Movement
                </a>
                <a href="{{ URL::to('applyrequest-for-services') }}" 
                   class="block px-4 py-3 rounded-md {{ request()->is('applyrequest-for-services') ? 'bg-gray-100 text-primary font-bold' : 'text-gray-700 hover:bg-gray-50' }} transition duration-300"
                   @if(request()->is('applyrequest-for-services')) aria-current="page" @endif>
                   Apply/Request for Services
                </a>
                <a href="{{ URL::to('learn-more') }}" 
                   class="block px-4 py-3 rounded-md {{ request()->is('learn-more') ? 'bg-gray-100 text-primary font-bold' : 'text-gray-700 hover:bg-gray-50' }} transition duration-300"
                   @if(request()->is('learn-more')) aria-current="page" @endif>
                   Learn More
                </a>
                <a href="{{ URL::to('events') }}" 
                   class="block px-4 py-3 rounded-md {{ request()->is('events') ? 'bg-gray-100 text-primary font-bold' : 'text-gray-700 hover:bg-gray-50' }} transition duration-300"
                   @if(request()->is('events')) aria-current="page" @endif>
                   Events
                </a>
                <a href="{{ URL::to('blog') }}" 
                   class="block px-4 py-3 rounded-md {{ request()->is('blog') ? 'bg-gray-100 text-primary font-bold' : 'text-gray-700 hover:bg-gray-50' }} transition duration-300"
                   @if(request()->is('blog')) aria-current="page" @endif>
                   Blog
                </a>
            </div>
        </nav>
    </header>
