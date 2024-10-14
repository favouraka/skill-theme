@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-wrap -mx-4">
        <!-- Main content -->
        <div class="w-full lg:w-2/3 px-4 mb-8">
            <article class="bg-white rounded-lg shadow-lg p-6">
                <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
                <p class="text-gray-600 mb-4">Published on {{ $post->created_at->format('F d, Y') }}</p>
                <div class="prose max-w-none">
                    {!! $post->content !!}
                </div>
            </article>

            <!-- Share section -->
            <div class="mt-8 bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-xl font-semibold mb-4">Share this post</h3>
                <div class="flex space-x-4">
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $post)) }}&text={{ urlencode($post->title) }}" target="_blank" class="text-blue-400 hover:text-blue-600">
                        <i class="fab fa-twitter fa-2x"></i>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post)) }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                        <i class="fab fa-facebook fa-2x"></i>
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('blog.show', $post)) }}&title={{ urlencode($post->title) }}" target="_blank" class="text-blue-700 hover:text-blue-900">
                        <i class="fab fa-linkedin fa-2x"></i>
                    </a>
                </div>
                <div class="mt-4">
                    <input type="text" value="{{ route('blog.show', $post) }}" class="w-full p-2 border rounded" readonly>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="w-full lg:w-1/3 px-4">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-xl font-semibold mb-4">Related Posts</h3>
                <ul class="space-y-4">
                    @foreach($relatedPosts as $relatedPost)
                        <li>
                            <a href="{{ route('blog.show', $relatedPost) }}" class="text-blue-600 hover:text-blue-800">
                                {{ $relatedPost->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
