<div class="mx-auto max-w-xl">
    @if (!$success)
        <form wire:submit="subscribe" class="space-y-4">
            <div>
                <input 
                    type="email" 
                    wire:model="email" 
                    placeholder="Enter your email address"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                >
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button 
                type="submit"
                class="w-full px-6 py-3 text-white bg-primary rounded-lg hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-colors"
            >
                Subscribe Now
            </button>
        </form>
    @else
        <div class="text-center">
            <svg class="w-16 h-16 mx-auto text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <h3 class="mt-4 text-xl font-semibold text-gray-900">Thank you for subscribing!</h3>
            <p class="mt-2 text-gray-600">You'll receive our latest updates in your inbox.</p>
        </div>
    @endif
</div>
