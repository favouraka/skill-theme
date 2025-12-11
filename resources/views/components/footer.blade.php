<footer class="bg-primary text-white py-8 mt-auto">
        <div class="container mx-auto px-6">
            <div class="flex flex-wrap justify-between gap-4">
                <div class="w-full md:w-1/4 mb-6 md:mb-0">
                    @php
                        $homeUrl = \Z3d0X\FilamentFabricator\Models\Page::whereTitle('Home')->exists()
                            ? '/' . \Z3d0X\FilamentFabricator\Models\Page::whereTitle('Home')->first()->slug
                            : '/';
                    @endphp
                    <h3 class="text-xl font-bold mb-4">
                        @php
                            $logoPath = 'img/footer-logo.webp';
                            $appName = env('APP_NAME', 'SkillSport');
                        @endphp

                        <a href="{{ $homeUrl }}">
                            @if(file_exists(public_path($logoPath)))
                                <img src="{{ asset($logoPath) }}" alt="Website Logo" class="h-32 w-auto">
                            @else
                                <span class="text-2xl font-bold">{{ $appName }}</span>
                            @endif
                        </a>
                    </h3>
                    <!-- <p class="text-sm">Empowering children for brighter futures through skill development and support.</p> -->
                </div>
                <div class="w-full md:w-1/4 mb-6 md:mb-0">
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ $homeUrl }}" class="hover:text-primary transition duration-300">Home</a></li>
                        @php
                            $otherPages = \Z3d0X\FilamentFabricator\Models\Page::where('title', '!=', 'Home')->whereNull('parent_id')->get();
                        @endphp
                        @foreach($otherPages as $page)
                            <li>
                                <a href="{{ url($page->slug) }}" class="hover:text-primary transition duration-300">
                                    {{ $page->title }}
                                </a>
                            </li>
                        @endforeach
                        @if($eventsEnabled)
                        <li><a href="{{ URL::to('events') }}" class="hover:text-primary transition duration-300">Events</a></li>
                        @endif
                        <li><a href="{{ URL::to('blog') }}" class="hover:text-primary transition duration-300">Blog</a></li>
                    </ul>
                </div>
                <div class="w-full md:w-1/4 mb-6 md:mb-0">
                    <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
                    <p class="text-sm">Email: {{ config('site-info.email') }}</p>
                    <p class="text-sm">Phone: {{ config('site-info.phone') }}</p>
                </div>
                <div class="w-full md:w-1/4">
                    <h4 class="text-lg font-semibold mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        @php
                            $socialMedia = \App\Models\SocialMedia::getActiveSocialMedia();
                            $platforms = config('social-media.platforms');
                        @endphp
                        @foreach($socialMedia as $social)
                            @php
                                $platformConfig = $platforms[$social->platform] ?? null;
                                $iconUrl = $platformConfig['icon_url'] ?? null;
                            @endphp
                            @if($platformConfig && $iconUrl)
                                <a href="{{ $social->url }}" class="text-white hover:text-primary transition duration-300" target="_blank" rel="noopener noreferrer" title="{{ $platformConfig['name'] }}">
                                    <img src="{{ $iconUrl }}" alt="{{ $platformConfig['name'] }} icon" class="h-6 w-6">
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="border-t border-secondary mt-8 pt-8 text-sm text-center">
                <p>&copy; {{ \Carbon\Carbon::now()->year }} {{env('APP_NAME', 'SkillSport')}}. All rights reserved.</p>
            </div>
        </div>
    </footer>
