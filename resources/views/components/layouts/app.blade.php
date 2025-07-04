<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{env('APP_NAME') ?? 'SkillSport' }}">
    <meta name="keywords" content="{{env('APP_NAME') ?? 'SkillSport' }}">
    <meta name="author" content="{{ env('APP_NAME') ?? 'SkillSport' }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:title" content="{{ env('APP_NAME') }}">
    <meta property="og:description" content="{{ config('app.name') }}">
    @if(file_exists(public_path('img/meta-image.webp')))
        <meta property="og:image" content="{{ asset('img/meta-image.webp') }}">
    @endif


    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ env('APP_URL') }}">
    <meta property="twitter:title" content="{{ env('APP_NAME') }}">
    <meta property="twitter:description" content="{{ env('APP_NAME') }}">
    @if(file_exists(public_path('img/meta-image.webp')))
    <meta property="twitter:image" content="{{ asset('img/meta-image.webp') }}">
    @endif
    
    <title>{{ env('APP_NAME') ?? 'SkillSport' }}</title>
    @filamentStyles
    @vite(['resources/css/app.css'])

    <style>
        [x-cloak] { display: none !important; }
    </style>
    @livewireStyles
</head>
<body class="bg-lightGray font-sans" x-data="{ mobileMenu: false }">
    <x-navbar/>
    {{$slot}}
    <x-footer/>
    @filamentScripts
    @livewireScripts
    @vite(['resources/js/app.js'])
    @stack('scripts')
</body>
</html>
