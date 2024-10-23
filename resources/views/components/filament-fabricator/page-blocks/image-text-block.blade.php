@aware(['page'])
<div x-data="{ showModal: false }" class="max-w-4xl w-full mx-auto p-4">
        <!-- Card Component -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden cursor-pointer transform transition-all duration-300 hover:scale-105 hover:shadow-xl flex flex-col md:flex-row">
            <!-- Image Section -->
            <div class="md:w-1/3 h-64 md:h-auto">
                @if(isset($image))
                    <img src="{{ $image }}" alt="Card Image" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-gray-200"></div>
                @endif
            </div>
            <!-- Content Section -->
            <div class="p-6 md:w-2/3 flex flex-col justify-between">
                <div>
                    <h2 class="text-3xl font-bold mb-4 text-primary">{{$heading}}</h2>
                    <div class="prose text-gray-600 mb-4">{!! $content !!}</div>
                </div>
                <div class="mt-4">
                    <button @click="showModal = true" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:w-auto sm:text-sm">
                        Contact Us
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div x-show="showModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div x-show="showModal" 
                    x-transition:enter="ease-out duration-300" 
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                    x-transition:leave="ease-in duration-200" 
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                    @close-modal.window="showModal = false"
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    
                    <livewire:image-text-block-form :heading="$heading" />
                </div>
            </div>
        </div>
    </div>
