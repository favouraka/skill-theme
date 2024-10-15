<div>
    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <form wire:submit.prevent="subscribe" class="space-y-4">
        <div>
            <label for="categories" class="block font-medium">Subscribe to Categories</label>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($allCategories as $category)
                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" wire:model="subscribedCategories" value="{{ $category->id }}" class="form-checkbox h-5 w-5 text-indigo-600">
                            <span class="ml-2">{{ $category->name }}</span>
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600">Update Subscriptions</button>
    </form>
</div>
