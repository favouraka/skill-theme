<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <meta name="application-name" content="{{ config('app.name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <style>[x-cloak] { display: none !important; }</style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        @livewireScripts
        @stack('scripts')
    </head>

    <body class="antialiased">
        <nav class="bg-gray-800 text-white p-4">
            <div class="container mx-auto flex justify-between items-center">
                <a href="{{ route('index') }}" class="text-xl font-bold">{{ config('app.name') }}</a>
                <ul class="flex space-x-4">
                    <li><a href="{{ route('index') }}" class="hover:text-gray-300">Home</a></li>
                    <li><a href="{{ route('blog.index') }}" class="hover:text-gray-300">Blog</a></li>
                    <!-- Add more navigation items as needed -->
                </ul>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <footer class="bg-gray-800 text-white p-4 mt-8">
            <div class="container mx-auto text-center">
                <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                <ul class="flex justify-center space-x-4 mt-2">
                    <li><a href="{{ route('index') }}" class="hover:text-gray-300">Home</a></li>
                    <li><a href="{{ route('blog.index') }}" class="hover:text-gray-300">Blog</a></li>
                    <!-- Add more footer links as needed -->
                </ul>
            </div>
        </footer>

        {{ $slot }}

        @livewire('notifications')
    </body>
</html>
