<div class="py-12 px-4 md:px-6 lg:px-8 max-w-7xl mx-auto">
    <div class="max-w-3xl mx-auto">
        @if($heading)
            <h2 class="text-3xl font-bold text-center mb-8">{{ $heading }}</h2>
        @endif

        <div class="space-y-4">
            @foreach($items as $item)
                <div x-data="{ open: false }" class="border border-gray-200 rounded-lg overflow-hidden">
                    <button 
                        @click="open = !open" 
                        class="w-full px-6 py-4 flex justify-between items-center bg-white hover:bg-gray-50 transition-colors duration-200"
                    >
                        <span class="text-lg font-medium text-gray-900">{{ $item['title'] }}</span>
                        <div 
                            class="transform transition-transform duration-200"
                            :class="{'rotate-0': !open, 'rotate-360': open}"
                        >
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                            </svg>
                        </div>
                    </button>
                    
                    <div 
                        x-show="open"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-2"
                        class="px-6 py-4 bg-white border-t border-gray-200"
                    >
                        <div class="prose max-w-none text-gray-700">{!! $item['content'] !!}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
