<div class="container mx-auto px-4 py-8">
    <section class="max-w-5xl mx-auto">
        <article>
        @if($post->featured_image)
            <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-64 object-cover mb-6">
        @endif

        <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>

        <div class="text-gray-600 mb-4">
            <p>By {{ $post->author }} | Published on {{ $post->published_at  }}</p>
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

        <div class="mt-8 flex space-x-4">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" rel="noopener noreferrer" class="bg-blue-600 text-white px-4 py-2 rounded-full flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                Share on Facebook
            </a>
            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&amp;text={{ urlencode($post->title) }}" target="_blank" rel="noopener noreferrer" class="bg-black text-white px-4 py-2 rounded-full flex items-center">
                <svg class="w-5 h-5 mr-2" width="24" height="24" viewBox="0 0 1200 1227" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M714.163 519.284L1160.89 0H1055.03L667.137 450.887L357.328 0H0L468.492 681.821L0 1226.37H105.866L515.491 750.218L842.672 1226.37H1200L714.137 519.284H714.163ZM569.165 687.828L521.697 619.934L144.011 79.6944H306.615L611.412 515.685L658.88 583.579L1055.08 1150.3H892.476L569.165 687.854V687.828Z" fill="white"/>
                </svg>
                Share on X
            </a>
            <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ urlencode(request()->url()) }}&amp;title={{ urlencode($post->title) }}" target="_blank" rel="noopener noreferrer" class="bg-blue-700 text-white px-4 py-2 rounded-full flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd" /></svg>
                Share on LinkedIn
            </a>
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
            <a href="{{ route('blog.index') }}" class="text-blue-500 hover:underline">&amp;larr; Back to Blog</a>
        </div>
    </section>
</div>
