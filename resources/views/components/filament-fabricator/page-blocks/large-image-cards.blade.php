@aware(['page'])
<div class="container mx-auto px-4 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($cards as $card)
            <div x-data="{ 
                showModal: false,
                content: @js($card['content']),
                truncatedContent: @js(strlen(strip_tags($card['content'])) > 260 ? substr(strip_tags($card['content']), 0, 260) . '...' : strip_tags($card['content']))
            }" class="relative group h-[400px] rounded-lg overflow-hidden">
                <!-- Background Image or Fallback -->
                <div class="absolute inset-0">
                    @if(isset($card['image']))
                        <img src="{{ $card['image'] }}" alt="{{ $card['heading'] }}" class="w-full h-full object-cover">
                    @endif
                    <div class="absolute inset-0 {{ $card['overlay_color'] === 'primary' ? 'bg-primary' : 'bg-tertiary' }} {{ isset($card['image']) ? 'bg-opacity-75' : 'bg-opacity-90' }}"></div>
                </div>

                <!-- Card Content -->
                <div class="relative h-full flex flex-col justify-between p-6 text-white">
                    <h3 class="text-2xl font-bold mb-4 uppercase">{{ $card['heading'] }}</h3>
                    <div class="prose prose-invert text-white">
                        <div x-html="truncatedContent"></div>
                        @if(strlen(strip_tags($card['content'])) > 260)
                            <button @click="showModal = true" class="mt-4 px-6 py-2 bg-white text-primary rounded-md hover:bg-gray-100 transition-colors">
                                Read More
                            </button>
                        @endif
                    </div>
                </div>

                <!-- Modal -->
                <div x-show="showModal" 
                     x-cloak 
                     class="fixed inset-0 z-50 overflow-y-auto" 
                     aria-labelledby="modal-title" 
                     role="dialog" 
                     aria-modal="true">
                    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                        <!-- Background overlay -->
                        <div x-show="showModal" 
                             x-transition:enter="ease-out duration-300" 
                             x-transition:enter-start="opacity-0" 
                             x-transition:enter-end="opacity-100" 
                             x-transition:leave="ease-in duration-200" 
                             x-transition:leave-start="opacity-100" 
                             x-transition:leave-end="opacity-0" 
                             class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" 
                             @click="showModal = false">
                        </div>

                        <!-- Modal panel -->
                        <div x-show="showModal" 
                             x-transition:enter="ease-out duration-300" 
                             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                             x-transition:leave="ease-in duration-200" 
                             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                             class="relative inline-block w-4/5 h-screen align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle">
                            
                            <!-- Modal content wrapper with sticky footer -->
                            <div class="flex flex-col max-w-5xl max-h-screen">
                                <!-- Modal header with image -->
                                <div class="relative h-48 flex-shrink-0">
                                    @if(isset($card['image']))
                                        <img src="{{ $card['image'] }}" alt="{{ $card['heading'] }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-gray-200"></div>
                                    @endif
                                    <div class="absolute inset-0 {{ $card['overlay_color'] === 'primary' ? 'bg-primary' : 'bg-tertiary' }} bg-opacity-75"></div>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <h3 class="text-3xl font-bold text-white uppercase text-center px-4">{{ $card['heading'] }}</h3>
                                    </div>
                                </div>

                                <!-- Modal body with scrollable content -->
                                <div class="flex-1 overflow-y-auto bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="prose max-w-none" x-html="content"></div>
                                </div>

                                <!-- Sticky footer -->
                                <div class="sticky bottom-0 bg-gray-50 px-4 py-3 sm:px-6 border-t border-gray-200">
                                    <div class="flex justify-end">
                                        <button type="button" 
                                                @click="showModal = false" 
                                                class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:text-sm">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@push('styles')
<style>
    [x-cloak] { display: none !important; }
</style>
@endpush
