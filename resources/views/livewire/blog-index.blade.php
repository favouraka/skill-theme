<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($blogs as $blog)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ $blog->featured_image }}" alt="{{ $blog->title }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-primary mb-2">{{ $blog->title }}</h2>
                    <p class="text-gray-600 mb-2">{{ $blog->excerpt ?? Str::limit($blog->content, 100) }}</p>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-secondary text-sm">By {{ $blog->author }}</span>
                        <span class="text-secondary text-sm">{{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}</span>
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
