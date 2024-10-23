<form wire:submit="submit" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                    Contact Us about {{$service_name}}
                </h3>
                <div class="mt-2">
                    <div class="space-y-4">
                        <div>
                            <label for="form_name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input 
                                type="text" 
                                wire:model="form_name" 
                                id="form_name" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm p-3 border border-gray-200">
                            @error('form_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="form_email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input 
                                type="email" 
                                wire:model="form_email" 
                                id="form_email" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm p-3 border border-gray-200">
                            @error('form_email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="form_message" class="block text-sm font-medium text-gray-700">Message</label>
                            <textarea 
                                wire:model="form_message" 
                                id="form_message" 
                                rows="3" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm p-3 border border-gray-200"></textarea>
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
        <button @click="showModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-tertiary sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Cancel
        </button>
    </div>
</form>
