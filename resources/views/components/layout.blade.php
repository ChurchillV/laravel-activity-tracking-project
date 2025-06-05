<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Log Project</title>

        {{-- @vite('resources/css/app.css') --}}
        @vite('resources/js/app.js')

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />

    </head>

    <body class="bg-gray-100 text-gray-700">
        <x-toast />

        <header class="bg-white shadow">
        <nav class="max-w-screen-lg px-4 md:px-12 py-4 mx-auto flex items-center justify-between flex-wrap">
            <div class="flex items-center flex-shrink-0 text-green-600 mr-6">
            <h1 class="text-xl font-bold ubuntu-bold">
                <a href="{{ route('landing') }}">
                Activity Tracker
                </a>
            </h1>
            </div>

            <!-- Mobile menu button -->
            <div class="block md:hidden">
            <button id="menu-toggle" class="flex items-center px-3 py-2 border rounded text-green-600 border-green-600 hover:text-white hover:border-green-800">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20">
                <title>Menu</title>
                <path d="M0 3h20v2H0zM0 9h20v2H0zM0 15h20v2H0z"/>
                </svg>
            </button>
            </div>

            <!-- Menu items -->
            <div id="menu" class="w-full flex-grow md:flex md:items-center md:justify-end md:w-auto hidden mt-4 md:mt-0 space-y-2 md:space-y-0 md:space-x-4">
            @guest
                <a href="{{ route('show.login') }}" class="inline-block px-4 py-2 border border-green-500 text-green-500 rounded hover:bg-green-600 hover:text-white transition">
                Login
                </a>
                <a href="{{ route('show.register') }}" class="inline-block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition">
                Register
                </a>
            @endguest

            @auth
                <a href="{{ route('logs.index') }}" class="block md:inline-block text-green-600 hover:text-green-800">
                All Activities
                </a>
                <a href="{{ route('logs.daily') }}" class="block md:inline-block text-green-600 hover:text-green-800">
                Daily Updates
                </a>
                <a href="{{ route('logs.report') }}" class="block md:inline-block text-green-600 hover:text-green-800">
                Reports
                </a>
                <a href="{{ route('logs.create') }}" class="inline-block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition">
                Create
                </a>

                <form action="{{ route('logout') }}" method="post" class="inline-block">
                @csrf
                <button class="inline-block px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                    Logout
                </button>
                </form>

                <span class="inline-block rounded-full bg-green-100 text-green-600 px-3 py-1 font-bold text-center">
                {{ substr(Auth::user()->name, 0, 1) }}
                </span>
            @endauth
            </div>
        </nav>
        </header>


<script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
        document.getElementById('menu').classList.toggle('hidden');
    });
</script>

        <main class="max-w-screen-lg mx-auto px-12 py-8">
            {{ $slot }}
        </main>
    </body>
</html>
