<div>
    <h2>Register for this event</h2>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="register">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" wire:model="name" required>
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" wire:model="email" required>
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button type="submit">Register</button>
    </form>
</div>
