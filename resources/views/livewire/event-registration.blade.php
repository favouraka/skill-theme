<div class="bg-gray-100 p-6 rounded-lg">
    <h2 class="text-2xl font-bold mb-4">Register for this event</h2>
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <form wire:submit.prevent="register" class="space-y-4">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
            <input type="text" id="name" wire:model="name" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
            <input type="email" id="email" wire:model="email" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300">Register</button>
    </form>
</div>
