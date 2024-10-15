@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Blog Posts</h1>
        
        <!-- Add your blog post list here -->
        <div class="space-y-6">
            <!-- Example blog post item -->
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-2">Sample Blog Post Title</h2>
                <p class="text-gray-600 mb-4">This is a brief excerpt of the blog post...</p>
                <a href="#" class="text-blue-500 hover:underline">Read more</a>
            </div>
            <!-- Repeat for more blog posts -->
        </div>
    </div>
@endsection
