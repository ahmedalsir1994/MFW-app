<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Page Not Found</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    <!-- import localy Fonts -->
    <link rel="preload" as="font" type="font/muslimah" href="/font/Muslimah-Thin.otf" crossorigin>
    <link rel="preload" as="font" type="font/helvetica" href="/font/helvetica-light" crossorigin>

    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />


    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="text-[#fafafa] flex p-4 sm:p-6 lg:p-8 items-center min-h-screen flex-col relative"
    style="background-image: url('{{ asset('img/bg.webp') }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-gradient-to-b from-black via-transparent to-black opacity-70 z-0"></div>
<div class="w-full max-w-7xl mx-auto">
    <a href="{{ url('/') }}" class="absolute top-4 left-4 sm:top-6 sm:left-6 lg:top-8 lg:left-8 z-10">
        <img src="{{ asset('img/logo.png') }}" alt="Muscat Fashion Week Logo" class="h-10 w-auto sm:h-12 lg:h-16">
    </a>
</div>
    <div class="relative z-10 text-center max-w-2xl">
        <h1 class="text-8xl font-extrabold mb-6 text-amber-500 drop-shadow-lg">404</h1>
        <p class="text-2xl sm:text-3xl mb-8 leading-relaxed text-gray-300 drop-shadow-md">
            Sorry, we couldn't find the page you were looking for. It might have been removed, renamed, or didn't exist in the first place.
        </p>
        <a href="{{ url('/') }}"
            class="bg-amber-600 text-white px-8 py-4 rounded-full text-lg font-semibold shadow-lg hover:bg-amber-500 transition-transform transform hover:scale-105">
            Go Back Home
        </a>
    </div>

    <footer class="absolute bottom-4 text-gray-400 text-sm z-10">
        <p>&copy; {{ date('Y') }} MFW. All rights reserved.</p>
    </footer>
</body>
</html>