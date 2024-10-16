<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SkillSport - Empowering Children for Brighter Futures">
    <meta name="keywords" content="SkillSport, Children, Empowerment, Education, Future">
    <meta name="author" content="SkillSport Team">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.skillsport.com/">
    <meta property="og:title" content="SkillSport - Empowering Children for Brighter Futures">
    <meta property="og:description" content="SkillSport - Empowering Children for Brighter Futures">
    <meta property="og:image" content="{{asset('img/meta-image.webp')}}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://www.skillsport.com/">
    <meta property="twitter:title" content="SkillSport - Empowering Children for Brighter Futures">
    <meta property="twitter:description" content="SkillSport - Empowering Children for Brighter Futures">
    <meta property="twitter:image" content="{{asset('img/meta-image.webp')}}">
    <title>{{ $title ?? 'SkillSport - Empowering Children for Brighter Futures' }}</title>
    @filamentStyles
    @vite(['resources/css/app.css'])

    <style>
        [x-cloak] { display: none !important; }
    </style>
    @livewireStyles
</head>
<body class="bg-lightGray font-sans" x-data="{ mobileMenu: false }">
    <x-navbar/>
    <main class="container mx-auto mt-8 px-4">
        {{$slot}}
    </main>
    <x-footer/>
    @livewireScripts
    @filamentScripts
    @stack('scripts')
</body>
</html>
