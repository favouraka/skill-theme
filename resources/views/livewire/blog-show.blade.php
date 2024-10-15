<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">{{ $post->title }}</h1>
    
    <div class="prose max-w-none">
        {!! $post->content !!}
    </div>

    <div class="mt-8">
        <a href="{{ route('blog.index') }}" class="text-blue-500 hover:underline">&larr; Back to Blog</a>
    </div>
</div>
