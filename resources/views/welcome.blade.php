<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Muscat Fashion Week</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    <!-- import localy Fonts -->
    <link rel="preload" as="font" type="font/muslimah" href="/font/Muslimah-Thin.otf" crossorigin>
    <link rel="preload" as="font" type="font/helvetica" href="/font/helvetica-light" crossorigin>

    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />


    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-[#fafafa] flex p-4 sm:p-6 lg:p-8 items-center min-h-screen flex-col "
    style="background-image: url('{{ asset('img/bg.webp') }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-black opacity-50 z-0"></div>
    <!-- error if found -->
    @if ($errors->any())
        <div class="absolute top-4 right-4 z-10 w-[300px] sm:w-[350px] md:w-[400px] lg:w-[450px]">
            <div class="bg-red-600 text-white p-4 rounded-lg shadow-lg">
                <h3 class="font-bold text-lg mb-2">Error</h3>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
                <div class="text-right mt-4">
                    <button onclick="this.parentElement.parentElement.style.display='none'"
                        class="bg-white text-red-600 px-3 py-1 rounded-full hover:bg-gray-100 transition-colors">
                        Close
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- success message if found -->
    @if (session('success'))
        <div class="absolute top-4 right-4 z-10">
            <div class="bg-green-600 text-white p-4 rounded-lg shadow-lg">
                <h3 class="font-bold text-lg mb-2">Success</h3>
                <p class="text-sm">{{ session('success') }}</p>
                <div class="text-right mt-4">
                    <button onclick="this.parentElement.parentElement.style.display='none'"
                        class="bg-white text-green-600 px-3 py-1 rounded-full hover:bg-gray-100 transition-colors">
                        Close
                    </button>
                </div>
            </div>
        </div>
    @endif
    <div class="absolute top-4 left-4 sm:top-6 sm:left-8 lg:top-8 lg:left-20 z-10">
        <img class="h-8 sm:h-10 md:h-12 lg:h-25" src="{{ asset('img/logo.png') }}" alt="Logo">
    </div>
    <div class="text-center pt-30 sm:pt-20 md:pt-24 lg:pt-[8rem] z-10 px-4">
        <p class="font-[Muslimah] text-sm sm:text-base md:text-lg lg:text-lg mb-2 sm:mb-3 uppercase">authentic journey
            to oman</p>
        <h1 class="font-[Muslimah] mb-2 sm:mb-3 text-2xl sm:text-3xl md:text-4xl lg:text-6xl uppercase">coming soon</h1>
        <p class="font-[Muslimah] text-sm sm:text-base md:text-lg lg:text-3xl uppercase">12 - 15 january 2026</p>
    </div>
    <div
        class="absolute bottom-40 left-1/2 transform -translate-x-1/2 sm:bottom-16 md:bottom-20 lg:bottom-20 lg:left-35 lg:transform-none z-10">
        <button>
            <a class="font-[helvetica] uppercase border-2 border-[#ffffff57] text-white font-bold py-2 px-4 sm:px-6 text-sm sm:text-base rounded-full hover:bg-white hover:text-[#1b1b18]"
                href="#">Register</a>
        </button>
    </div>

    <!-- pop for register -->
    <div class="absolute bottom-10 lg:bottom-20 lg:left-20 z-10">
        <form action="{{ route('create') }}" method="POST">
            @csrf
            <div id="popup"
                class="hidden fixed inset-0 bg-[#000000d3] bg-opacity-10 items-center justify-center z-50 p-4">
                <div class="bg-[#0c0c0c] p-4 sm:p-6 rounded-lg shadow-lg w-full max-w-sm sm:max-w-md relative">
                    <button type="button" id="closePopupX"
                        class="absolute top-2 right-2 text-white hover:text-gray-300 text-xl font-bold w-8 h-8 flex items-center justify-center rounded-full hover:bg-[#ffffff1a] transition-colors">&times;</button>
                    <h2 class="text-lg sm:text-xl font-bold mb-4 text-white">Register</h2>

                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="bg-red-500 text-white p-2 rounded mb-4 text-sm">
                            <ul class="list-none">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required
                        class="w-full mb-3 p-2 text-sm sm:text-base border border-gray-600 rounded text-white bg-gray-800 placeholder-gray-400">
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required
                        class="w-full mb-3 p-2 text-sm sm:text-base border border-gray-600 rounded text-white bg-gray-800 placeholder-gray-400">
                    <input type="text" name="company" placeholder="Company" value="{{ old('company') }}"
                        class="w-full mb-3 p-2 text-sm sm:text-base border border-gray-600 rounded text-white bg-gray-800 placeholder-gray-400">
                    <input type="text" name="job_title" placeholder="Job Title" value="{{ old('job_title') }}"
                        class="w-full mb-3 p-2 text-sm sm:text-base border border-gray-600 rounded text-white bg-gray-800 placeholder-gray-400">
                    <input type="tel" name="phone" placeholder="Phone Number" value="{{ old('phone') }}"
                        class="w-full mb-3 p-2 text-sm sm:text-base border border-gray-600 rounded text-white bg-gray-800 placeholder-gray-400">
                    <input type="text" name="country" placeholder="Country" value="{{ old('country') }}"
                        class="w-full mb-3 p-2 text-sm sm:text-base border border-gray-600 rounded text-white bg-gray-800 placeholder-gray-400">
                    <div class="buttons flex justify-center">
                        <button type="submit"
                            class="w-full sm:w-auto border-2 border-[#ffffff57] text-white font-bold py-2 px-4 sm:px-6 text-sm sm:text-base rounded-full hover:bg-white hover:text-[#1b1b18] uppercase">Submit</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
    <script>
        document.querySelector('a').addEventListener('click', function (event) {
            event.preventDefault();
            document.getElementById('popup').classList.remove('hidden');
            document.getElementById('popup').classList.add('flex');
        });

        document.getElementById('closePopupX').addEventListener('click', function () {
            document.getElementById('popup').classList.add('hidden');
            document.getElementById('popup').classList.remove('flex');
        });

        // Show popup if there are validation errors
        @if ($errors->any())
            document.getElementById('popup').classList.remove('hidden');
            document.getElementById('popup').classList.add('flex');
        @endif

        // Close popup when clicking outside of it
        document.getElementById('popup').addEventListener('click', function (event) {
            if (event.target === this) {
                this.classList.add('hidden');
                this.classList.remove('flex');
            }
        });
    </script>
</body>

</html>