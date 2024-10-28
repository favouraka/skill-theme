<div class="container mx-auto px-4 py-8">            
    <div class="mb-4 gap-4 text-sm md:text-base flex flex-col md:flex-row items-center justify-between">
        <input type="text" wire:model.live="search" placeholder="Search blogs..." class="border border-gray-300 rounded px-3 py-2 w-full md:w-1/2">
        <div x-data="{ selected: 'latest' }" class="ml-4 bg-gray-100" wire:model.live="filter">
            <button type="button" x-on:click="selected = 'latest'; $dispatch('input', 'latest' )" :class="selected === 'latest' ? 'p-2 px-3 rounded-md bg-white font-semibold text-gray-700 shadow-md' : 'p-2 px-3 rounded-md bg-transparent text-gray-400'">Newest</button>
            <button type="button" x-on:click="selected = 'oldest'; $dispatch('input', 'oldest' )" :class="selected === 'oldest' ? 'p-2 px-3 rounded-md bg-white font-semibold text-gray-700 shadow-md' : 'p-2 px-3 rounded-md bg-transparent text-gray-400'">Oldest</button>
            <button type="button" x-on:click="selected = 'this_week'; $dispatch('input', 'this_week')" :class="selected === 'this_week' ? 'p-2 px-3 rounded-md bg-white font-semibold text-gray-700 shadow-md' : 'p-2 px-3 rounded-md bg-transparent text-gray-400'">This Week</button>
        </div>
    </div>

    <!-- Skeleton Loader -->
    <div wire:loading.block wire:target="filter" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @for ($i = 0; $i < 6; $i++)
            <div class="bg-white rounded-lg shadow-md overflow-hidden animate-pulse">
                <div class="w-full h-48 bg-gray-200"></div>
                <div class="p-4">
                    <div class="h-6 bg-gray-200 rounded w-3/4 mb-2"></div>
                    <div class="h-4 bg-gray-200 rounded w-full mb-2"></div>
                    <div class="h-4 bg-gray-200 rounded w-2/3 mb-2"></div>
                    <div class="flex justify-between items-center mb-2">
                        <div class="h-4 bg-gray-200 rounded w-1/4"></div>
                        <div class="h-4 bg-gray-200 rounded w-1/4"></div>
                    </div>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <div class="h-6 bg-gray-200 rounded w-16"></div>
                        <div class="h-6 bg-gray-200 rounded w-20"></div>
                        <div class="h-6 bg-gray-200 rounded w-14"></div>
                    </div>
                    <div class="h-10 bg-gray-200 rounded w-32"></div>
                </div>
            </div>
        @endfor
    </div>

    <!-- Actual Content -->
    <div wire:loading.remove wire:target="filter" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($blogs as $blog)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ $blog->featured_image }}" alt="{{ $blog->title }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-primary mb-2">{{ $blog->title }}</h2>
                    <p class="text-gray-600 mb-2">{{ $blog->excerpt ?? Str::limit($blog->content, 100) }}</p>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-secondary text-sm">By {{ $blog->author }}</span>
                        <span class="text-secondary text-sm">{{ \Carbon\Carbon::parse($blog->published_at)->diffForHumans() }}</span>
                    </div>
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach(json_decode($blog->tags) as $tag)
                            <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded-full text-xs">{{ $tag }}</span>
                        @endforeach
                    </div>
                    <a href="{{ route('blog.show', $blog) }}" class="bg-tertiary text-white px-4 py-2 rounded-md hover:bg-opacity-80 transition">Read More</a>
                </div>
            </div>
        @empty
            <div class="col-span-full flex justify-center mx-auto">
                <div class="bg-white rounded-lg shadow-md p-8 max-w-md w-full text-center">
                    <div class="flex justify-center mb-4">
                        <svg class="w-16 h-16 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">No Blog Posts Found</h3>
                    <p class="text-gray-600">@if($search)No blog posts match your search criteria.@else No blog posts have been published yet.@endif</p>
                </div>
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $blogs->links() }}
    </div>

    @if(isset($relatedPosts) && $relatedPosts->count() > 0)
        <div class="mt-12">
            <h3 class="text-2xl font-semibold mb-4">Related Posts</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($relatedPosts as $relatedPost)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ $relatedPost->featured_image }}" alt="{{ $relatedPost->title }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h4 class="text-lg font-semibold text-primary mb-2">{{ $relatedPost->title }}</h4>
                            <p class="text-gray-600 mb-2">{{ Str::limit($relatedPost->excerpt ?? $relatedPost->content, 50) }}</p>
                            <a href="{{ route('blog.show', $relatedPost) }}" class="text-tertiary hover:underline">Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
