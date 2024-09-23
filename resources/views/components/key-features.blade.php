
<div x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false" class="bg-white rounded-lg shadow-lg p-6 transition duration-300 transform hover:-translate-y-2" x-data x-intersect="$el.classList.add('animate-fade-in-up')">
    <div class="text-4xl mb-4 text-primary">
        {{-- icon here--}}
        {{$icon}}
    </div>
    <h3 class="text-xl font-semibold mb-2"> {{$title}} </h3>
    <p
        x-show="hover == true"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="text-gray-600">
      {{$slot}} </p>
</div>
