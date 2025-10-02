<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    <!-- import localy Fonts -->
    <link rel="preload" as="font" type="font/muslimah" href="/font/Muslimah-Thin.otf" crossorigin>
    <link rel="preload" as="font" type="font/helvetica" href="/font/helvetica-light" crossorigin>

    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />


    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="text-[#f3f3f3] flex min-h-screen">
    <div class="flex w-full">
        <div class="w-1/4">
            @include('admin.partial.sidebar')
        </div>
        <div class="flex-1 p-6">
            @yield('content')
        </div>
    </div>
</body>
</html>