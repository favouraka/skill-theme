<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Blog Posts</h1>
    
    <div class="space-y-6">
        @foreach ($blogs as $blog)
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-2">{{ $blog->title }}</h2>
                <p class="text-gray-600 mb-4">{{ Str::limit($blog->content, 150) }}</p>
                <a href="{{ route('blog.show', $blog) }}" class="text-blue-500 hover:underline">Read more</a>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $blogs->links() }}
    </div>
</div>
