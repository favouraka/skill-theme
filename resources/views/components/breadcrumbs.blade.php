@props(['items'])

<nav aria-label="Breadcrumb" class="mb-6">
    <ol class="flex flex-wrap items-center space-x-2 text-sm text-gray-600">
        <li>
            <a href="{{ URL::to('/') }}" class="hover:text-primary transition duration-150 ease-in-out">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                </svg>
            </a>
        </li>
        @foreach($items as $item)
            <li class="flex items-center">
                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                </svg>
                @if(!$loop->last)
                    <a href="{{ $item['url'] }}" class="ml-2 hover:text-primary transition duration-150 ease-in-out">
                        {{ $item['label'] }}
                    </a>
                @else
                    <span class="ml-2 font-medium text-gray-800" aria-current="page">
                        {{ $item['label'] }}
                    </span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
