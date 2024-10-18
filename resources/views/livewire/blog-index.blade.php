<div class="container mx-auto px-4 py-8">
    <div class="mb-4 gap-4 text-sm md:text-base flex flex-col md:flex-row items-center justify-between">
        <input type="text" wire:model.live="search" placeholder="Search blogs..." class="border border-gray-300 rounded px-3 py-2 w-full md:w-1/2">
        <div x-data="{ selected: 'latest' }" class="ml-4" wire:model.live="filter">
            <button type="button" x-on:click="selected = 'latest'; $dispatch('input', 'latest' )" :class="selected === 'latest' ? 'p-2 px-3 rounded-md bg-primary text-white' : 'p-2 px-3 rounded-md bg-gray-300 text-gray-800'">Newest</button>
            <button type="button" x-on:click="selected = 'oldest'; $dispatch('input', 'oldest' )" :class="selected === 'oldest' ? 'p-2 px-3 rounded-md bg-primary text-white' : 'p-2 px-3 rounded-md bg-gray-300 text-gray-800'">Oldest</button>
            <button type="button" x-on:click="selected = 'this_week'; $dispatch('input', 'this_week')" :class="selected === 'this_week' ? 'p-2 px-3 rounded-md bg-primary text-white' : 'p-2 px-3 rounded-md bg-gray-300 text-gray-800'">This Week</button>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($blogs as $blog)
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
        @endforeach
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
