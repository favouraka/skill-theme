<div class="container mx-auto px-4 py-8">
    <article>
        @if($post->featured_image)
            <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-64 object-cover mb-6">
        @endif

        <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>

        <div class="text-gray-600 mb-4">
            <p>By {{ $post->author }} | Published on {{ $post->published_at ? $post->published_at->format('F j, Y') : $post->created_at->format('F j, Y') }}</p>
            @if($post->tags)
                <p class="mt-2">
                    Tags: 
                    @foreach(json_decode($post->tags) as $tag)
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $tag }}</span>
                    @endforeach
                </p>
            @endif
        </div>

        @if($post->excerpt)
            <div class="text-lg text-gray-700 mb-6">
                {{ $post->excerpt }}
            </div>
        @endif

        <div class="prose max-w-none">
            {!! $post->content !!}
        </div>
    </article>

    @if($relatedPosts->isNotEmpty())
        <div class="mt-12">
            <h2 class="text-2xl font-bold mb-4">Related Posts</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedPosts as $relatedPost)
                    <div class="border rounded-lg overflow-hidden">
                        @if($relatedPost->featured_image)
                            <img src="{{ $relatedPost->featured_image }}" alt="{{ $relatedPost->title }}" class="w-full h-48 object-cover">
                        @endif
                        <div class="p-4">
                            <h3 class="text-xl font-semibold mb-2">{{ $relatedPost->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($relatedPost->excerpt ?? $relatedPost->content, 100) }}</p>
                            <a href="{{ route('blog.show', $relatedPost) }}" class="text-blue-500 hover:underline">Read more</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <div class="mt-8">
        <a href="{{ route('blog.index') }}" class="text-blue-500 hover:underline">&larr; Back to Blog</a>
    </div>
</div>
