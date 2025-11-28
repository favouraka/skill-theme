@props([
    'heading' => 'Our Partners',
    'subheading' => null,
    'scroll_direction' => 'left-to-right',
    'scroll_speed' => 'normal',
    'pause_on_hover' => true,
    'logos' => []
])

@php
    // Determine animation duration based on speed setting
    $duration = match($scroll_speed) {
        'slow' => '30s',
        'normal' => '20s',
        'fast' => '10s',
        default => '20s'
    };
    
    // Determine animation direction
    $animationName = $scroll_direction === 'left-to-right' ? 'scrollLeft' : 'scrollRight';
    
    // Ensure we have logos to display
    if (empty($logos)) {
        $logos = [];
    }
@endphp

<section class="py-12 bg-gray-50 overflow-hidden">
    <div class="container mx-auto px-4">
        @if($heading || $subheading)
        <div class="text-center mb-8">
            @if($heading)
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $heading }}</h2>
            @endif
            @if($subheading)
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">{{ $subheading }}</p>
            @endif
        </div>
        @endif
        
        @if(!empty($logos))
        <div class="relative logo-strip-container {{ $pause_on_hover ? 'pause-on-hover' : '' }}" 
             x-data="logoStrip()" 
             x-init="init()">
            
            <!-- Logo Track Container -->
            <div class="overflow-hidden">
                <!-- Logo Track - will be duplicated for infinite scroll -->
                <div class="flex logo-track" 
                     style="animation-duration: {{ $duration }};">
                    
                    <!-- First set of logos -->
                    @foreach($logos as $logo)
                    <div class="flex-shrink-0 mx-8 logo-item">
                        @if($logo['url'])
                        <a href="{{ $logo['url'] }}" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="block transition-transform duration-300 hover:scale-110">
                            <img src="{{ asset('storage/'.$logo['image']) }}" 
                                 alt="{{ $logo['alt_text'] }}"
                                 class="h-12 md:h-16 lg:h-20 w-auto object-contain filter grayscale opacity-70 hover:grayscale-0 hover:opacity-100 transition-all duration-300">
                        </a>
                        @else
                        <div class="transition-transform duration-300 hover:scale-110">
                            <img src="{{ asset('storage/'.$logo['image']) }}" 
                                 alt="{{ $logo['alt_text'] }}"
                                 class="h-12 md:h-16 lg:h-20 w-auto object-contain filter grayscale opacity-70 hover:grayscale-0 hover:opacity-100 transition-all duration-300">
                        </div>
                        @endif
                    </div>
                    @endforeach
                    
                    <!-- Duplicate set of logos for seamless infinite scroll -->
                    @foreach($logos as $logo)
                    <div class="flex-shrink-0 mx-8 logo-item">
                        @if($logo['url'])
                        <a href="{{ $logo['url'] }}" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="block transition-transform duration-300 hover:scale-110">
                            <img src="{{ asset('storage/'.$logo['image']) }}" 
                                 alt="{{ $logo['alt_text'] }}"
                                 class="h-12 md:h-16 lg:h-20 w-auto object-contain filter grayscale opacity-70 hover:grayscale-0 hover:opacity-100 transition-all duration-300">
                        </a>
                        @else
                        <div class="transition-transform duration-300 hover:scale-110">
                            <img src="{{ asset('storage/'.$logo['image']) }}" 
                                 alt="{{ $logo['alt_text'] }}"
                                 class="h-12 md:h-16 lg:h-20 w-auto object-contain filter grayscale opacity-70 hover:grayscale-0 hover:opacity-100 transition-all duration-300">
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @else
        <div class="text-center py-8">
            <p class="text-gray-500">No logos added yet. Please add logos in the page builder.</p>
        </div>
        @endif
    </div>
</section>

<style>
/* Infinite scroll animations */
@keyframes scrollLeft {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}

@keyframes scrollRight {
    0% {
        transform: translateX(-50%);
    }
    100% {
        transform: translateX(0);
    }
}

/* Apply animation based on direction */
.logo-track {
    animation: {{ $animationName }} {{ $duration }} linear infinite;
    will-change: transform;
}

/* Pause on hover functionality */
.pause-on-hover:hover .logo-track {
    animation-play-state: paused;
}

/* Respect prefers-reduced-motion */
@media (prefers-reduced-motion: reduce) {
    .logo-track {
        animation: none;
        transform: translateX(0) !important;
    }
    
    .logo-strip-container {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    
    .logo-track {
        display: flex;
        width: max-content;
    }
}

/* Smooth scrolling for touch devices */
@media (max-width: 768px) {
    .logo-strip-container {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
        -ms-overflow-style: none;
    }
    
    .logo-strip-container::-webkit-scrollbar {
        display: none;
    }
    
    .logo-track {
        animation: none;
        display: flex;
        width: max-content;
    }
    
    .pause-on-hover:hover .logo-track {
        animation-play-state: running;
    }
}

/* Ensure proper spacing and alignment */
.logo-item {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: fit-content;
}

/* Improve image rendering */
img {
    image-rendering: -webkit-optimize-contrast;
    image-rendering: crisp-edges;
}
</style>

<script>
// Logo strip functionality
function logoStrip() {
    return {
        init() {
            // Check for reduced motion preference
            const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            
            if (prefersReducedMotion) {
                // Disable animations for users who prefer reduced motion
                const logoTrack = this.$el.querySelector('.logo-track');
                if (logoTrack) {
                    logoTrack.style.animation = 'none';
                }
            }
            
            // Handle intersection observer for performance
            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        const logoTrack = entry.target.querySelector('.logo-track');
                        if (logoTrack) {
                            if (entry.isIntersecting) {
                                logoTrack.style.animationPlayState = 'running';
                            } else {
                                logoTrack.style.animationPlayState = 'paused';
                            }
                        }
                    });
                }, {
                    threshold: 0.1
                });
                
                observer.observe(this.$el);
            }
        }
    }
}
</script>