<header class="bg-white shadow-md">
        <nav class="container mx-auto px-6 py-2" aria-label="Main navigation">
            <div class="flex justify-between items-center">
                @php
                    $homeUrl = \Z3d0X\FilamentFabricator\Models\Page::whereTitle('Home')->exists()
                        ? '/' . \Z3d0X\FilamentFabricator\Models\Page::whereTitle('Home')->first()->slug
                        : '/';
                @endphp
                <a href="{{ $homeUrl }}" class="text-2xl font-bold text-primary">
                  @php
                     $logoPath = 'img/main-logo.webp';
                     $logoExists = file_exists(public_path($logoPath));
                  @endphp

                  @if($logoExists)
                     <img src="{{ asset($logoPath) }}" alt="SkillSport Logo" class="h-12 w-auto">
                  @else
                     {{ config('app.name', 'SkillSport') }}
                  @endif
                </a>

                <div class="hidden lg:flex space-x-6 text-sm">
                    <a href="{{ $homeUrl }}"
                       class="text-gray-700 px-3 py-2 rounded-md {{ request()->is('/') ? 'bg-gray-100 text-primary font-bold' : 'hover:bg-gray-50' }} transition duration-300"
                       @if(request()->is('/')) aria-current="page" @endif>
                       Home
                    </a>
                  @php
                     $menuItems = \Z3d0X\FilamentFabricator\Models\Page::where('title', '!=', 'Home')->get();
                  @endphp

                  @foreach($menuItems as $menuItem)
                     <a href="{{ '/' . $menuItem->slug }}"
                        class="text-gray-700 px-3 py-2 rounded-md {{ request()->is($menuItem->slug) ? 'bg-gray-100 text-primary font-bold' : 'hover:bg-gray-50' }} transition duration-300"
                        @if(request()->is($menuItem->slug)) aria-current="page" @endif>
                        {{ $menuItem->title }}
                     </a>
                  @endforeach

                  <!-- event and blog links -->
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
                <a href="{{ $homeUrl }}"
                   class="block px-4 py-3 rounded-md {{ request()->is('/') ? 'bg-gray-100 text-primary font-bold' : 'text-gray-700 hover:bg-gray-50' }} transition duration-300"
                   @if(request()->is('/')) aria-current="page" @endif>
                   Home
                </a>
                 @foreach($menuItems as $menuItem)
                   <a href="{{ '/' . $menuItem->slug }}"
                     class="block px-4 py-3 rounded-md {{ request()->is($menuItem->slug) ? 'bg-gray-100 text-primary font-bold' : 'text-gray-700 hover:bg-gray-50' }} transition duration-300"
                     @if(request()->is($menuItem->slug)) aria-current="page" @endif>
                     {{ $menuItem->title }}
                   </a>
                 @endforeach
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
