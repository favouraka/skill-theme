@props(['cancel' =>true])

<form wire:submit="submit" class=" max-w-5xl mx-auto align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 w-full">
    <div class="bg-white px-8 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                <h3 class="text-3xl font-heavy my-8 leading-6 font-medium text-gray-900" id="modal-title">
                   {{ $service_name }}
                </h3>
                {{-- listener that show success --}}
                @if (session()->has('message'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('message') }}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                        </span>
                    </div>
                @endif
                <div class="mt-2 max-w-4xl ">
                    <div class="space-y-4">
                        <div>
                            <label for="form_name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input 
                                type="text" 
                                wire:model="form_name" 
                                id="form_name" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm p-3 border">
                            @error('form_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="form_email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input 
                                type="email" 
                                wire:model="form_email" 
                                id="form_email" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm p-3 border">
                            @error('form_email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="form_phone" class="block text-sm font-medium text-gray-700">Phone (optional)</label>
                            <input
                                type="text"
                                wire:model="form_phone"
                                id="form_phone"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm p-3 border">
                            @error('form_phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="service" class="block text-sm font-medium text-gray-700">Service</label>
                            @if(count($services) === 0)
                                <!-- No services - readonly text input with General Inquiry -->
                                <input
                                    type="text"
                                    wire:model="selected_service"
                                    id="service"
                                    readonly
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm p-3 border bg-gray-100">
                            @elseif(count($services) === 1)
                                <!-- Single service - readonly text input with the service name -->
                                <input
                                    type="text"
                                    wire:model="selected_service"
                                    id="service"
                                    readonly
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm p-3 border bg-gray-100">
                            @else
                                <!-- Multiple services - custom dropdown selector -->
                                <div class="relative">
                                    <input
                                        type="text"
                                        wire:model="selected_service"
                                        id="service"
                                        readonly
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm p-3 border cursor-pointer"
                                        onclick="toggleDropdown()">
                                    <div class="absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <!-- Dropdown options -->
                                    <div id="service-dropdown" class="hidden absolute z-10 mt-1 w-full bg-white border border-gray-300 rounded-md shadow-lg max-h-60 overflow-auto">
                                        <div class="p-2">
                                            @foreach($services as $service)
                                                <div
                                                    class="p-2 hover:bg-gray-100 cursor-pointer rounded"
                                                    onclick="selectService('{{ $service['name'] }}')">
                                                    {{ $service['name'] }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    function toggleDropdown() {
                                        const dropdown = document.getElementById('service-dropdown');
                                        dropdown.classList.toggle('hidden');
                                    }

                                    function selectService(serviceName) {
                                        @this.set('selected_service', serviceName);
                                        document.getElementById('service-dropdown').classList.add('hidden');
                                    }

                                    // Close dropdown when clicking outside
                                    document.addEventListener('click', function(event) {
                                        const dropdown = document.getElementById('service-dropdown');
                                        const input = document.getElementById('service');

                                        if (dropdown && input && !dropdown.contains(event.target) && !input.contains(event.target)) {
                                            dropdown.classList.add('hidden');
                                        }
                                    });
                                </script>
                            @endif
                        </div>
                        <div>
                            <label for="form_message" class="block text-sm font-medium text-gray-700">Message</label>
                            <textarea
                                wire:model="form_message"
                                id="form_message"
                                rows="3"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm p-3 border"></textarea>
                            @error('form_message') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:ml-3 sm:w-auto sm:text-sm">
            Submit
        </button>
        @if($this->cancelBtn)
        <button @click="showModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-tertiary sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Cancel
        </button>
        @endif
    </div>
</form>
