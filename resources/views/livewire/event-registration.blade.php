<div>
    <h2>Register for this event</h2>
    <form wire:submit.prevent="register">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" wire:model="email" required>
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button type="submit">Register</button>
    </form>
    
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
</div>
