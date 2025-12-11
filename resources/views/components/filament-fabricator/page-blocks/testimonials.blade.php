@props(['heading' => null, 'testimonials' => []])

<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">
            {{ $heading ?: 'Testimonials' }}
        </h2>

        <div class="relative" x-data="testimonialsScroller()" x-init="initScroller()">
            <div class="flex overflow-x-auto gap-6 pb-4 snap-x snap-mandatory scrollbar-hide" x-ref="container">
                @foreach($testimonials as $testimonial)
                    <div class="snap-start flex-none w-full sm:w-[350px] bg-white rounded-lg shadow-lg p-6 transition-transform duration-300 hover:-translate-y-2 hover:shadow-xl"
                         x-ref="testimonial-{{ $loop->index }}"
                         :class="{'opacity-0': !visibleTestimonials.includes({{ $loop->index }})}">
                        <div class="flex flex-col items-center">
                            @if($testimonial->image)
                                <div class="w-20 h-20 rounded-full overflow-hidden mb-4">
                                    <img src="{{ $testimonial->image }}" alt="{{ $testimonial->name }}" class="w-full h-full object-cover">
                                </div>
                            @endif
                            
                            <div class="text-gray-600 text-center mb-4 prose">
                                "{!! $testimonial->content !!}"
                            </div>
                            
                            <div class="text-center">
                                <h4 class="font-semibold text-lg text-primary">{{ $testimonial->name }}</h4>
                                @if($testimonial->description)
                                    <p class="text-gray-500">{{ $testimonial->description }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('testimonialsScroller', () => ({
            visibleTestimonials: [],
            scrollPosition: 0,
            animationFrameId: null,
            testimonialCount: {{ count($testimonials) }},

            initScroller() {
                if (this.testimonialCount <= 1) return;

                // Initialize visible testimonials
                this.checkVisibleTestimonials();

                // Start auto-scrolling
                this.startAutoScroll();

                // Handle window resize
                window.addEventListener('resize', () => {
                    this.startAutoScroll();
                });
            },

            calculateScrollSpeed() {
                const screenWidth = window.innerWidth;

                // Base speed (pixels per second)
                let baseSpeed = 30;

                // Adjust speed based on screen size
                if (screenWidth < 640) { // Mobile
                    baseSpeed = 20;
                } else if (screenWidth < 1024) { // Tablet
                    baseSpeed = 25;
                }

                // Adjust speed based on testimonial count
                const testimonialFactor = Math.min(1 + (this.testimonialCount / 10), 3);
                baseSpeed = Math.min(baseSpeed * testimonialFactor, 80);

                return baseSpeed;
            },

            checkVisibleTestimonials() {
                const container = this.$refs.container;
                if (!container) return;

                const containerRect = container.getBoundingClientRect();
                const visible = [];

                for (let i = 0; i < this.testimonialCount; i++) {
                    const testimonial = this.$refs[`testimonial-${i}`];
                    if (!testimonial) continue;

                    const testimonialRect = testimonial.getBoundingClientRect();

                    // Check if testimonial is partially or fully visible
                    const isVisible = (
                        testimonialRect.right > containerRect.left &&
                        testimonialRect.left < containerRect.right
                    );

                    if (isVisible) {
                        visible.push(i);
                    }
                }

                this.visibleTestimonials = visible;
            },

            startAutoScroll() {
                // Cancel any existing animation
                if (this.animationFrameId) {
                    cancelAnimationFrame(this.animationFrameId);
                }

                const container = this.$refs.container;
                if (!container) return;

                const scrollSpeed = this.calculateScrollSpeed();
                const scrollAmount = scrollSpeed / 60; // Convert to pixels per frame (60fps)
                const maxScroll = container.scrollWidth - container.clientWidth;

                const scroll = () => {
                    this.scrollPosition += scrollAmount;

                    // Reset to beginning when reaching the end
                    if (this.scrollPosition >= maxScroll) {
                        this.scrollPosition = 0;
                        this.visibleTestimonials = []; // Reset visible testimonials
                    }

                    container.scrollLeft = this.scrollPosition;

                    // Check which testimonials are visible
                    this.checkVisibleTestimonials();

                    this.animationFrameId = requestAnimationFrame(scroll);
                };

                scroll();
            }
        }));
    });
</script>
