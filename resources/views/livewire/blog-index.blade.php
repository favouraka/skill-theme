<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($blogs as $blog)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ $blog->featured_image }}" alt="{{ $blog->title }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-primary mb-2">{{ $blog->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ Str::limit($blog->content, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-secondary text-sm">{{ $blog->created_at->format('M d, Y') }}</span>
                        <a href="{{ route('blog.show', $blog) }}" class="bg-tertiary text-white px-4 py-2 rounded-md hover:bg-opacity-80 transition">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-8">
        {{ $blogs->links() }}
    </div>
</div>
